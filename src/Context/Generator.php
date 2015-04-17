<?php


namespace Giberson\Tdd\Apigility\Context;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Giberson\Tdd\Apigility\PluginManager\Config\Endpoint;
use Giberson\Tdd\Apigility\PluginManager\ConfigPluginManager;

class Generator implements Context, ConfigPluginManagerAware
{
    /**
     * @var array merged apigility configuration
     */
    protected static $apigility_config = [];

    /** @var array generated configuration from scenario */
    protected $config = [];

    /** @var  ConfigPluginManager */
    protected $configPlugin;

    /**
     * Merge an array into the apigility config
     * @param array $config
     */
    public static function mergeConfig(array $config)
    {
        self::$apigility_config = array_replace_recursive(
            self::$apigility_config,
            $config
        );
    }

    /**
     * @BeforeSuite
     */
    public static function beforeSuite(BeforeSuiteScope $scope)
    {
        // load existing config from output path (if exists)
    }

    /**
     * @AfterSuite
     */
    public static function afterSuite(AfterSuiteScope $scope)
    {
        // write updated config to output path
        var_dump(self::$apigility_config);
    }

    /** @BeforeScenario */
    public function beforeScenario(BeforeScenarioScope $scope)
    {
        $this->config = [];
    }

    /** @AfterScenario */
    public function afterScenario(AfterScenarioScope $scope)
    {

        self::mergeConfig($this->config);
    }

    /**
     * @Given /^a REST endpoint "([^"]*)"$/
     */
    public function aRESTEndpoint($arg1)
    {
        /** @var Endpoint $endpoint */
        $endpoint = $this->getBuilderPluginManager()->get('endpoint');
        $this->config = array_replace(
            $this->config,
            $endpoint->REST($arg1)
        );
    }

    /**
     * @param ConfigPluginManager $manager
     * @return mixed
     */
    public function setBuilderPluginManager(ConfigPluginManager $manager)
    {
        $this->configPlugin = $manager;
    }

    /**
     * @return ConfigPluginManager
     */
    public function getBuilderPluginManager()
    {
        return $this->configPlugin;
    }
}