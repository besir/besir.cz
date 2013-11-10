<?php

namespace AdminModule;

use Nette\Application\UI;


/**
 * @author Petr Besir Horacek <sirbesir@gmail.com>
 * Sign in/out presenters.
 */
class SignPresenter extends AdminModule\AdminPresenter
{
	/**
	 * Sign-in form factory.
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new UI\Form;
		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}

	/**
	 * Sign in process
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param \Nette|Application\UI\Form $form
	 * @return void
	 */
	public function signInFormSucceeded(\Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->getUser()->setExpiration('+ 14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('+ 20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
			return;
		}

		$this->redirect('Homepage:');
	}

	/**
	 * Sign::out
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 */
	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
