<?php

namespace FrontModule\component\model\service;

/**
 * ContactMeControl service
 * @author Petr Besir Horáček <sirbesir@gmail.com>
 */
class ContactMeControl extends \Nette\Object
{

	/** @var \FrontModule\component\model\dao\ContactMeControl $contactMeDao */
	private $contactMeControlDao;

	/**
	 * Construct
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \FrontModule\component\model\dao\ContactMeControl $contactMeControlDao
	 */
	public function __construct(\FrontModule\component\model\dao\ContactMeControl $contactMeControlDao)
	{
		$this->injectContactMeControlDao($contactMeControlDao);
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param array $data
	 */
	public function saveMessage($data)
	{
		return $this->getContactMeControlDao()->saveMessage($data);
	}

		/**
	 * ContactMe DAO getter
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @return \FrontModule\component\model\dao\ContactMeControl
	 */
	private function getContactMeControlDao()
	{
		return $this->contactMeControlDao;
	}

	// <editor-fold defaultstate="collapsed" desc="Dependency injection">
	/**
	 * ContactMeControl DAO injection
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \FrontModule\component\model\dao\ContactMeControl $contactMeControlDao
	 */
	private function injectContactMeControlDao(\FrontModule\component\model\dao\ContactMeControl $contactMeControlDao)
	{
		if ($this->contactMeControlDao !== NULL)
		{
			throw new \Nette\InvalidStateException('ContactMe DAO has already been set');
		}
		$this->contactMeControlDao = $contactMeControlDao;
	}
	// </editor-fold>
}