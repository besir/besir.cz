<?php

namespace FrontModule\component\model\dao;

/**
 * ContactMeControl DAO
 * @author Petr Besir Horáček <sirbesir@gmail.com>
 */
class ContactMeControl extends \Nette\Object
{

	/** @var \DibiConnection $database */
	private $database;

	/**
	 * Construct
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 */
	public function __construct(\DibiConnection $database)
	{
		$this->injectDatabase($database);
	}

	/**
	 * @author Petr Besir Horacek <sirbesir@gmail.com>
	 * @param array $data
	 */
	public function saveMessage($data)
	{
		return	$this->getDatabase()
				->insert('com_contact_me', $data)
				->execute();
	}

	/**
	 * Database getter
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @return \DibiConnection
	 */
	public function getDatabase()
	{
		return $this->database;
	}

	// <editor-fold defaultstate="collapsed" desc="Dependency injection">
	/**
	 * Database injection
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \DibiConnection $database
	 */
	private function injectDatabase(\DibiConnection $database)
	{
		if ($this->database !== NULL)
		{
			throw new \Nette\InvalidStateException('Database has already been set');
		}
		$this->database = $database;
	}
	// </editor-fold>
}