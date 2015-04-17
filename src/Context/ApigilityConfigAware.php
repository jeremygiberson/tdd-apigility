<?php


namespace Giberson\Tdd\Apigility\Context;


use Giberson\Tdd\Apigility\Config\Apigility;

interface ApigilityConfigAware
{
    /**
     * @param $config
     * @return mixed
     */
    public function setApigilityConfig(Apigility $config);

    /**
     * @return Apigility
     */
    public function getApigilityConfig();
}