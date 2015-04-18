<?php


namespace Giberson\Tdd\Apigility\Tooling;


use Giberson\Tdd\Apigility\Config\Configuration;
use Zend\Config\Writer\PhpArray;
use ZF\Configuration\ConfigResource;

class Project
{
    /** @var  string */
    protected $module_path;
    /** @var  string */
    protected $module_namespace;
    /** @var  string */
    protected $application_config_path;
    /** @var  string */
    protected $application_path;

    /**
     * @return string
     */
    public function getModulePath()
    {
        return $this->module_path;
    }

    /**
     * @param string $module_path
     * @return self
     */
    public function setModulePath($module_path)
    {
        $this->module_path = $module_path;
        return $this;
    }

    /**
     * @return string
     */
    public function getModuleNamespace()
    {
        return $this->module_namespace;
    }

    /**
     * @param string $module_namespace
     * @return self
     */
    public function setModuleNamespace($module_namespace)
    {
        $this->module_namespace = $module_namespace;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationConfigPath()
    {
        return $this->application_config_path;
    }

    /**
     * @param string $application_config_path
     * @return self
     */
    public function setApplicationConfigPath($application_config_path)
    {
        $this->application_config_path = $application_config_path;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationPath()
    {
        return $this->application_path;
    }

    /**
     * @param string $application_path
     * @return self
     */
    public function setApplicationPath($application_path)
    {
        $this->application_path = $application_path;
        return $this;
    }

    public function update(Configuration $config)
    {
        $this->getModuleConfigResource()->patch($config);
    }

    /**
     * @return ConfigResource
     */
    protected function getModuleConfigResource()
    {
        $config_path = $this->getModulePath() . '/config';

        if(!file_exists($config_path))
        {
            mkdir($config_path,0755,true);
        }

        $file_name = sprintf("%s/config/module.config.php",
            $this->getModulePath());

        $existing_config = file_exists($file_name) ? include $file_name : [];

        $config_resource = new ConfigResource(
            $existing_config,
            $file_name,
            new PhpArray());

        return $config_resource;
    }
}