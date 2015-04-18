<?php


namespace Giberson\Tdd\Apigility\Context\Initializer;


use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Giberson\Tdd\Apigility\Config\Configuration;
use Giberson\Tdd\Apigility\Context\ConfigurationAware;

class ConfigurationAwareInitializer implements ContextInitializer
{
    /** @var  Configuration */
    protected $config;

    public function __construct()
    {
        $this->config = new Configuration();
    }

    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof ConfigurationAware) {
            return;
        }

        $context->setConfiguration($this->config);
    }
}