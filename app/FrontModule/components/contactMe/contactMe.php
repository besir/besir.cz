<?php

namespace FrontModule\control;

/**
 * ContactMeControl
 * @author Petr Besir Horáček <sirbesir@gmail.com>
 */
class ContactMeControl extends \Nette\Application\UI\Control
{
	/** @var \Nette\Application\UI\Form */
	private $form;

	/** @var bool */
	private $toGlobalFlashes = FALSE;

	/** @var bool */
	private $saveToDB = FALSE;

	/** @var bool */
	private $sendEmail = FALSE;

	/** @var \FrontModule\component\model\service\ContactMeControl */
	private $model;

	/** @var string */
	private $redirectTo = 'this';

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 */
	public function __construct(\Nette\Application\UI\Form $form, \FrontModule\component\model\service\ContactMeControl $model)
	{
		$this->setForm($form);
		$this->injectContactMeControlService($model);
	}

	/**
	 * Render setup
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @see Nette\Application\Control#render()
	 */
	public function render()
	{
		$this->getTemplate()->form = $this->getForm();
		$this->getTemplate()->setFile(__DIR__.'/templates/contactMe.latte');
		$this->getTemplate()->render();
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return \Nette\Application\UI\Form
	 */
	protected function createComponentContactForm()
	{
		$form = $this->getForm();

		$form->addProtection('Vypršel ochranný klíč, odešlete prosím formulář znovu.');

		$form->addText('name', 'Jméno')
				->setAttribute('placeholder', 'Celé jméno')
				->setAttribute('type', 'name')
				->setRequired('Zadejte prosím své celé jméno.');
		$form->addText('mailaddress', 'Email')
				->setAttribute('placeholder', 'E-mail')
				->setAttribute('type', 'email')
				->setRequired('Zadejte prosím svůj e-mail.')
				->addRule(\Nette\Forms\Form::EMAIL, 'Zadejte prosím svůj e-mail ve správném formátu.');
		$form->addText('subject', 'Předmět')
				->setAttribute('placeholder', 'Předmět')
				->setRequired('Zadejte prosím předmět zprávy.');
		$form->addTextArea('message', 'Dotaz')
				->setAttribute('placeholder', 'Vaše zpráva')
				->setRequired('Napište mi prosím nějakou zprávu.')
				->addRule(\Nette\Forms\Form::MIN_LENGTH, 'Napište mi prosím delší vzkaz abych měl co číst :-) Minimální délka vzkazu je %d znaků.', 20);
		$form->addText('email', 'E-mail')
				->setAttribute('style', 'display:none;')
				->setAttribute('type', 'email');
		$form->addSubmit('submit', 'Odeslat dotaz');

		$form->onSuccess[] = array($this, 'processForm');
		$form->onValidate[] = array($this, 'validateForm');
		$form->onError[] = array($this, 'onFormError');

		return $form;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 * @return bool
	 */
	public function processForm(\Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();
		$values = $this->prepareData($values);

		$stored = $sended = TRUE;

		if ($this->getSaveToDB())
		{
			$stored = $this->storeMessage($values);
		}
		if ($this->getSendEmail())
		{
			$sended = $this->sendEmail($values);
		}

		if ($stored && $sended)
		{
			$this->flashMessage('Zpráva byla úspěšně odeslána, děkuji.', 'success');
			$this->redirect($this->getRedirectTo());
			return TRUE;
		}

		$this->flashMessage('Při odesílání zprávy došlo k neznámé chybě. Zkuste to prosím později.', 'error');
		return FALSE;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 * @return boolean
	 * @throws \Nette\InvalidArgumentException
	 */
	public function validateForm(\Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();

		try
		{
			if(!empty($values->email))
			{
				throw new \Nette\InvalidArgumentException('Děkuji za snahu, ale SPAM nemám rád.');
			}
		}
		catch (\Exception $exception)
		{
			$form->addError($exception->getMessage());
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Delete ANTI-SPAM data for saving
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\ArrayHash $values
	 * @return \Nette\ArrayHash
	 */
	private function prepareData($values)
	{
		$values['email'] = $values['mailaddress'];
		unset($values['mailaddress']);

		return $values;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 * @return boolean
	 */
	public function onFormError(\Nette\Application\UI\Form $form)
	{
		$errors = $form->getErrors();
		foreach ($errors as $error)
		{
			if ($this->getToGlobalFlashes())
			{
				$this->getPresenter()->flashMessage($error, 'error');
			}
			else
			{
				$this->flashMessage('Při odesílání zprávy došlo k neznámé chybě. Zkuste to prosím později.', 'error');
			}
		}
		return FALSE;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\ArrayHash $values
	 */
	private function storeMessage($values)
	{
		try
		{
			$this->getModel()->saveMessage($values);
			return TRUE;
		}
		catch (\Exception $exception)
		{
			return FALSE;
		}
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\ArrayHash $values
	 * @return boolean
	 */
	private function sendEmail($values)
	{
		return TRUE;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return \Nette\Application\UI\Form
	 */
	public function getForm()
	{
		return $this->form;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return bool
	 */
	public function getToGlobalFlashes()
	{
		return $this->toGlobalFlashes;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return bool
	 */
	public function getSaveToDB()
	{
		return $this->saveToDB;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return bool
	 */
	public function getSendEmail()
	{
		return $this->sendEmail;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return \FrontModule\component\model\service\ContactMeControl
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return string
	 */
	public function getRedirectTo()
	{
		return $this->redirectTo;
	}


	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 */
	public function setForm(\Nette\Application\UI\Form $form)
	{
		$this->form = $form;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param bool $toGlobalFlashes
	 */
	public function setToGlobalFlashes($toGlobalFlashes)
	{
		$this->toGlobalFlashes = $toGlobalFlashes;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param bool $saveToDB
	 */
	public function setSaveToDB($saveToDB)
	{
		$this->saveToDB = $saveToDB;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param bool $sendEmail
	 */
	public function setSendEmail($sendEmail)
	{
		$this->sendEmail = $sendEmail;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param string $redirectTo
	 */
	public function setRedirectTo($redirectTo)
	{
		$this->redirectTo = $redirectTo;
	}

	// <editor-fold defaultstate="collapsed" desc="Dependency injection">
	/**
	 * ContactMeControl Service injection
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \FrontModule\component\model\service\ContactMeControl $contactMeDao
	 */
	private function injectContactMeControlService(\FrontModule\component\model\service\ContactMeControl $model)
	{
		if ($this->model !== NULL)
		{
			throw new \Nette\InvalidStateException('ContactMe DAO has already been set');
		}
		$this->model = $model;
	}
	// </editor-fold>
}