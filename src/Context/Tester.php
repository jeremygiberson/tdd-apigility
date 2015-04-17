<?php


namespace Giberson\Tdd\Apigility\Context;


use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Class Tester
 * Defines steps that test generated apigility skeleton against the behat steps
 * that generated the skeleton
 * @package Giberson\Tdd\Apigility\Context
 */
class Tester implements Context, ApigilityStepsInterface
{

    /**
     * @Given /^a REST endpoint "([^"]*)"$/
     */
    public function aRESTEndpoint($arg1)
    {
        throw new PendingException;
    }
}