<?php


namespace Giberson\Tdd\Apigility\Context;


use Giberson\Tdd\Apigility\PluginManager\ConfigPluginManager;

interface ConfigPluginManagerAware
{
    /**
     * @param ConfigPluginManager $manager
     * @return mixed
     */
    public function setBuilderPluginManager(ConfigPluginManager $manager);

    /**
     * @return ConfigPluginManager
     */
    public function getBuilderPluginManager();
}