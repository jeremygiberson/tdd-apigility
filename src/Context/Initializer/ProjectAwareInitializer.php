<?php


namespace Giberson\Tdd\Apigility\Context\Initializer;


use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Giberson\Tdd\Apigility\Tooling\Project;
use Giberson\Tdd\Apigility\Tooling\ProjectAware;

class ProjectAwareInitializer implements ContextInitializer
{
    /** @var  array */
    protected $config;

    /**
     * ConfigPluginManagerAwareInitializer constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof ProjectAware) {
            return;
        }

        $config = $this->config;

        $project = new Project();
        $project->setApplicationConfigPath($config['application_config_path']);
        $project->setModuleNamespace($config['module_namespace']);
        $project->setModulePath($config['module_path']);
        $project->setApplicationPath(getcwd());
        $context->setProject($project);
    }
}