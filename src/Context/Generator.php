<?php


namespace Giberson\Tdd\Apigility\Context;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Giberson\Tdd\Apigility\Config\Apigility;
use Giberson\Tdd\Apigility\PluginManager\Config\Endpoint;

class Generator implements Context, ConfigPluginManagerAware, ApigilityConfigAware
{
    use ApigilityConfigAwareTrait;
    use ConfigPluginManagerAwareTrait;

    /**
     * @var array merged apigility configuration
     */
    protected static $merged_apigility_config = [];

    /** @var array generated configuration from scenario */
    protected $config = [];

    /**
     * Generator constructor.
     */
    public function __construct()
    {
        echo "foo";
    }


    /**
     * Merge an array into the apigility config
     * @param Apigility $config
     */
    public static function mergeConfig(Apigility $config)
    {
        self::$merged_apigility_config = array_replace_recursive(
            self::$merged_apigility_config,
            $config->getArrayCopy()
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
        var_dump(self::$merged_apigility_config);
    }

    /** @BeforeScenario */
    public function beforeScenario(BeforeScenarioScope $scope)
    {
        $this->getApigilityConfig()->reset();
    }

    /** @AfterScenario */
    public function afterScenario(AfterScenarioScope $scope)
    {
        self::mergeConfig($this->getApigilityConfig());
    }

    /**
     * @Given /^a REST endpoint "([^"]*)"$/
     */
    public function aRESTEndpoint($arg1)
    {
        /** @var Endpoint $endpoint */
        $endpoint = $this->getConfigPluginManager()->get('endpoint');
        $this->getApigilityConfig()->merge(
            $endpoint->REST($arg1)
        );
    }

}