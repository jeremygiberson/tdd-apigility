<?php


namespace Giberson\Tdd\Apigility\Context;


use Giberson\Tdd\Apigility\Config\Apigility;

trait ApigilityConfigAwareTrait
{
    /** @var  Apigility */
    protected $apigility_config;

    /**
     * @return Apigility
     */
    public function getApigilityConfig()
    {
        return $this->apigility_config;
    }

    /**
     * @param Apigility $merged_apigility_config
     * @return self
     */
    public function setApigilityConfig(Apigility $merged_apigility_config)
    {
        $this->apigility_config = $merged_apigility_config;
        return $this;
    }


}