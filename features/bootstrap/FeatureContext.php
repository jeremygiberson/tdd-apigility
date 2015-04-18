<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Giberson\Tdd\Apigility\Context\ConfigurationAware;
use Giberson\Tdd\Apigility\Context\ConfigurationAwareTrait;

/**
 * Defines steps used to test the extension
 */
class FeatureContext implements Context, SnippetAcceptingContext, ConfigurationAware
{
    use ConfigurationAwareTrait;

    /**
     * @Then /^configuration will contain "([^"]*)"$/
     */
    public function configurationWillContain($array_path)
    {
        $config = $this->getConfiguration()->getArrayCopy();
        $indexes = explode('/', $array_path);
        while(!empty($indexes)){
            $index = array_shift($indexes);
            if(!isset($config[$index]))
                throw new RuntimeException("$array_path is not set in configuration");
            $config = $config[$index];
        }
    }
}