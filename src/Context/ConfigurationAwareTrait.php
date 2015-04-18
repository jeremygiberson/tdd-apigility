<?php


namespace Giberson\Tdd\Apigility\Context;


use Giberson\Tdd\Apigility\Config\Configuration;

trait ConfigurationAwareTrait
{
    /** @var  Configuration */
    protected $configuration;

    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param Configuration $configuration
     * @return self
     */
    public function setConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }


}