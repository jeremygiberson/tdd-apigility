<?php


namespace Giberson\Tdd\Apigility\Context\Initializer;


use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Giberson\Tdd\Apigility\Config\Apigility;
use Giberson\Tdd\Apigility\Context\ApigilityConfigAware;

class ApigilityConfigAwareInitializer implements ContextInitializer
{
    /** @var  Apigility */
    protected $config;

    public function __construct()
    {
        $this->config = new Apigility();
    }

    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof ApigilityConfigAware) {
            return;
        }

        $context->setApigilityConfig($this->config);
    }
}