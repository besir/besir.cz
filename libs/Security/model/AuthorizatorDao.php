<?php

namespace Security;

/**
 * Authorizator DAO
 * @author Petr Besir Horáček <sirbesir@gmail.com>
 */
class AuthorizatorDao extends \Nette\Object
{

	/** @var \Nette\Database\Connection $database */
	private $database;

	/**
	 * Construct
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 */
	public function __construct(\Nette\Database\Connection $database)
	{
		$this->injectDatabase($database);
	}

	public function getPrivileges()
	{
		return $this->getDatabase()
					->table('acl_privileg')
					->fetch();
	}

	public function getResources()
	{
		return $this->getDatabase()
					->table('acl_resource')
					->fetch();
	}

	public function getRoles()
	{
		return $this->getDatabase()
					->table('acl_role')
					->fetch();
	}

	public function getRules()
	{
		return $this->getDatabase()
					->table('acl_rule')
					->fetch();
	}

	// <editor-fold defaultstate="collapsed" desc="Dependency injection">
	/**
	 * Database injection
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \Nette\Database\Connection $database
	 */
	private function injectDatabase(\Nette\Database\Connection $database)
	{
		if ($this->database !== NULL)
		{
			throw new \Nette\InvalidStateException('Database has already been set');
		}
		$this->database = $database;
	}
	// </editor-fold>

	/**
	 * Database getter
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @return \Nette\Database\Connection
	 */
	public function getDatabase()
	{
		return $this->database;
	}
}