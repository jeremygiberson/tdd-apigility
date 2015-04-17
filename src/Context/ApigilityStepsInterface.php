<?php


namespace Giberson\Tdd\Apigility\Context;

/**
 * Interface ApigilityStepsInterface
 * The steps that the extension provides
 * (forces Generator & Tester to implement same methods)
 * @package Giberson\Tdd\Apigility\Context
 */
interface ApigilityStepsInterface
{
    /**
     * @Given /^a REST endpoint "([^"]*)"$/
     */
    public function aRESTEndpoint($arg1);
}