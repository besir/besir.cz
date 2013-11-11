<?php

namespace FrontModule\control;

/**
 * ContactMeControl
 * @author Petr Besir Horáček <sirbesir@gmail.com>
 */
class ContactMeControl extends \Nette\Application\UI\Control
{
	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @var \Nette\Application\UI\Form
	 */
	private $form;

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 */
	public function __construct(\Nette\Application\UI\Form $form)
	{
		$this->setForm($form);
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

		$form->addProtection('CSRF Expired');

		$form->addText('name', 'Jméno')
				->setAttribute('placeholder', 'Celé jméno')
				->setRequired('Zadejte prosím své celé jméno.');
		$form->addText('mailaddress', 'Email')
				->setAttribute('placeholder', 'E-mail')
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
				->setAttribute('style', 'display:none;');
		$form->addSubmit('submit', 'Odeslat dotaz');

		$form->onSuccess[] = array($this, 'processForm');
		$form->onValidate[] = array($this, 'validateForm');
		$form->onError[] = array($this, 'onFormError');

		return $form;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 */
	public function processForm(\Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();

		$values = $this->prepareData($values);

		if ($this->storeMessage($values) && $this->sendEmail($values))
		{
			$this->flashMessage('Zpráva byla úspěšně odeslána, děkuji.', 'success');
		}
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
	public function prepareData($values)
	{
		$values['email'] = $values['mailaddress'];
		unset($values['mailaddress']);

		return $values;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\ArrayHash $values
	 */
	public function storeMessage($values)
	{
		return TRUE;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\ArrayHash $values
	 * @return boolean
	 */
	public function sendEmail($values)
	{
		return TRUE;
	}

	public function onFormError(\Nette\Application\UI\Form $form)
	{
		\Nette\Diagnostics\Debugger::barDump('Pridavam chyby');
		$errors = $form->getErrors();
		foreach ($errors as $error)
		{
			$this->flashMessage($error, 'error');
		}
		return FALSE;
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
	 * @param \Nette\Application\UI\Form $form
	 */
	public function setForm(\Nette\Application\UI\Form $form)
	{
		$this->form = $form;
	}


}