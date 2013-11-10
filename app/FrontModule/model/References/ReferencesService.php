<?php

namespace FrontModule\model\service;

/**
 * References service
 * @author Petr Besir Horáček <sirbesir@gmail.com>
 */
class References extends \Nette\Object
{

	/** @var \FrontModule\model\dao\References $referencesDao */
	private $referencesDao;

	/**
	 * Construct
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \FrontModule\model\dao\References $referencesDao
	 */
	public function __construct(\FrontModule\model\dao\References $referencesDao)
	{
		$this->injectReferencesDao($referencesDao);
	}

	// <editor-fold defaultstate="collapsed" desc="Dependency injection">
	/**
	 * References DAO injection
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @param \FrontModule\model\dao\References $referencesDao
	 */
	private function injectReferencesDao(\FrontModule\model\dao\References $referencesDao)
	{
		if ($this->referencesDao !== NULL)
		{
			throw new \Nette\InvalidStateException('References DAO has already been set');
		}
		$this->referencesDao = $referencesDao;
	}
	// </editor-fold>

	/**
	 * References DAO getter
	 * @author Petr Besir Horáček <sirbesir@gmail.com>
	 * @return \FrontModule\model\dao\References
	 */
	private function getReferencesDao()
	{
		return $this->referencesDao;
	}
}