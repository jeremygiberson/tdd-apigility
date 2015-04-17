<?php


namespace Giberson\Tdd\Apigility\Context;


use Giberson\Tdd\Apigility\PluginManager\ConfigPluginManager;

trait ConfigPluginManagerAwareTrait
{
    /** @var  ConfigPluginManager */
    protected $configPlugin;

    /**
     * @param ConfigPluginManager $manager
     * @return mixed
     */
    public function setConfigPluginManager(ConfigPluginManager $manager)
    {
        $this->configPlugin = $manager;
    }

    /**
     * @return ConfigPluginManager
     */
    public function getConfigPluginManager()
    {
        return $this->configPlugin;
    }
}