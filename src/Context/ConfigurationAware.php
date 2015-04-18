<?php


namespace Giberson\Tdd\Apigility\Context;


use Giberson\Tdd\Apigility\Config\Configuration;

interface ConfigurationAware
{
    /**
     * @param $config
     * @return mixed
     */
    public function setConfiguration(Configuration $config);

    /**
     * @return Configuration
     */
    public function getConfiguration();
}