<?php


namespace Giberson\Tdd\Apigility\Context;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Giberson\Tdd\Apigility\Config\Configuration;
use Giberson\Tdd\Apigility\PluginManager\Config\Endpoint;
use Giberson\Tdd\Apigility\Tooling\ProjectAware;
use Giberson\Tdd\Apigility\Tooling\ProjectAwareTrait;

/**
 * Class Generator
 * Defines steps used to generate apigility configuration
 * @package Giberson\Tdd\Configuration\Context
 */
class Generator implements Context,
    ConfigPluginManagerAware,
    ConfigurationAware,
    ApigilityStepsInterface,
    ProjectAware
{
    use ConfigurationAwareTrait;
    use ConfigPluginManagerAwareTrait;
    use ProjectAwareTrait;

    /**
     * @var array merged apigility configuration
     */
    protected static $merged_apigility_config = [];

    /** @var array generated configuration from scenario */
    protected $config = [];

    /**
     * Merge an array into the apigility config
     * @param Configuration $config
     */
    public static function mergeConfig(Configuration $config)
    {
        self::$merged_apigility_config = array_replace_recursive(
            self::$merged_apigility_config,
            $config->getArrayCopy()
        );
    }

    /** @BeforeScenario */
    public function beforeScenario(BeforeScenarioScope $scope)
    {
        $this->getConfiguration()->reset();
    }

    /** @AfterScenario */
    public function afterScenario(AfterScenarioScope $scope)
    {
        $this->getProject()->update($this->getConfiguration());
    }


    public function aRESTEndpoint($arg1)
    {
        /** @var Endpoint $endpoint */
        $endpoint = $this->getConfigPluginManager()->get('endpoint');
        $this->getConfiguration()->merge(
            $endpoint->REST($arg1)
        );
    }

}