<?php


namespace Giberson\Tdd\Apigility\Context\Initializer;


use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Giberson\Tdd\Apigility\Context\ConfigPluginManagerAware;
use Giberson\Tdd\Apigility\PluginManager\Config\Endpoint;
use Giberson\Tdd\Apigility\PluginManager\ConfigPluginManager;

class ConfigPluginManagerAwareInitializer implements ContextInitializer
{
    /** @var  array */
    protected $config;

    /**
     * ConfigPluginManagerAwareInitializer constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof ConfigPluginManagerAware) {
            return;
        }

        $manager = new ConfigPluginManager();
        $manager->setService(Endpoint::class, new Endpoint);
        $manager->setAlias('endpoint', Endpoint::class);
        $context->setBuilderPluginManager($manager);
    }
}