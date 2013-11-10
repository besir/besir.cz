<?php

namespace FrontModule;

/**
 * FrontModule base presenter
 * @author Petr Besir Horacek <sirbesir@gmail.com>
 */
class FrontPresenter extends \BasePresenter
{
        /** @var string $projectName */
        private $projectName;

        /** @var array $configParameters */
        private $configParameters;

        /**
         * @author Petr Besir Horacek <sirbesir@gmail.com>
         */
        public function startup()
        {
            parent::startup();
            $this->setConfigParameters($this->getContext()->getParameters());
            $this->getTemplate()->projectName = $this->getConfigParameter('projetcName');
        }

        /**
         * @author Petr Besir Horacek <sirbesir@gmail.com>
         * @return string
         */
        public function getProjectName()
        {
            return $this->projectName;
        }

        /**
         * @author Petr Besir Horacek <sirbesir@gmail.com>
         * @param string $projectName
         */
        public function setProjectName($projectName)
        {
            $this->projectName = $projectName;
        }

        /**
         * @author Petr Besir Horacek <sirbesir@gmail.com>
         * @param array $parameters
         */
        private function setConfigParameters($parameters)
        {
            $this->configParameters = $parameters;
        }

        /**
         * @author Petr Besir Horacek <sirbesir@gmail.com>
         * @param string $parameter
         * @return mixed
         */
        protected function getConfigParameter($parameter = NULL)
        {
            return \Nette\Utils\Arrays::get($this->configParameters, $parameter, NULL);
        }
}
