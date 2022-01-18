<?php
namespace muuska\config\source;

use muuska\config\AbstractConfiguration;
use muuska\util\App;

class MailConfiguration extends AbstractConfiguration{

    protected static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * {@inheritDoc}
     * @see \muuska\config\AbstractConfiguration::load()
     */
    protected function load()
    {
        $config = App::configs()->createJSONConfiguration(App::getApp()->getRootConfigDir().'mail.json');
        $this->configValues = $config->getAll();
    }
    
    /**
     * {@inheritDoc}
     * @see \muuska\config\Configuration::save()
     */
    public function save()
    {

    }
}