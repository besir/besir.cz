<?php

namespace FrontModule;

/**
 * Homepage presenter
 * @author Petr Besir Horacek <sirbesir@gmail.com>
 */
class HomepagePresenter extends \FrontModule\FrontPresenter
{

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 */
	public function renderDefault()
	{
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @return \FrontModule\control\ContactMeControl
	 */
	public function createComponentContactMe()
	{
		$contactMe = $this->getContext()->createContactMe();
		$contactMe->setRedirectTo('this#contact');
		$contactMe->setSaveToDB(TRUE);
		return $contactMe;
	}
}
