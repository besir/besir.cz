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
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return \Nette\Application\UI\Form
	 */
	protected function createComponentContactForm()
	{
		$form = $this->getForm();

		$form->addProtection('CSRF Expired');

		$form->addText('name', 'Jméno')
				->setAttribute('placeholder', 'Jméno');
		$form->addText('mailaddress', 'Email')
				->setAttribute('placeholder', 'E-mail');
		$form->addText('subject', 'Předmět')
				->setAttribute('placeholder', 'Předmět');
		$form->addTextArea('message', 'Dotaz')
				->setAttribute('placeholder', 'Vzkaz / dotaz');
		$form->addText('email');
		$form->addSubmit('submit', 'Odeslat dotaz');

		$form->onSuccess[] = array($this, 'processForm');

		return $form;
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette\Application\UI\Form $form
	 */
	public function processForm(\Nette\Application\UI\Form $form)
	{
		\Nette\Diagnostics\Debugger::barDump('odeslano');
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