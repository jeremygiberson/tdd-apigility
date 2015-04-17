<?php


namespace Giberson\Tdd\Apigility;
use Behat\Behat\Context\ServiceContainer\ContextExtension;
use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Giberson\Tdd\Apigility\Context\Initializer\ApigilityConfigAwareInitializer;
use Giberson\Tdd\Apigility\Context\Initializer\ConfigPluginManagerAwareInitializer;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class Extension implements ExtensionInterface
{
    const EXTENSION_ID = 'tdd_apigility';
    const CONFIG_ID = 'tdd_apigility_config';

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        // TODO: Implement process() method.
    }

    /**
     * Returns the extension config key.
     *
     * @return string
     */
    public function getConfigKey()
    {
        return 'tdd_apigility';
    }

    /**
     * Initializes other extensions.
     *
     * This method is called immediately after all extensions are activated but
     * before any extension `configure()` method is called. This allows extensions
     * to hook into the configuration of other extensions providing such an
     * extension point.
     *
     * @param ExtensionManager $extensionManager
     */
    public function initialize(ExtensionManager $extensionManager)
    {
        // TODO: Implement initialize() method.
    }

    /**
     * Setups configuration for the extension.
     *
     * @param ArrayNodeDefinition $builder
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        // http://symfony.com/doc/current/components/config/definition.html#default-and-required-values
        $builder->children()
            ->scalarNode('namespace')
                ->defaultValue('Generated\\Apigility\\')
                ->end()
            ->scalarNode('generator_path')
                ->defaultValue('generated_src')
                ->end();
    }

    /**
     * Loads extension services into temporary container.
     *
     * @param ContainerBuilder $container
     * @param array $config
     */
    public function load(ContainerBuilder $container, array $config)
    {
        $container->set(self::CONFIG_ID, $config);

        $this->loadContextInitializer($container);

    }

    private function loadContextInitializer(ContainerBuilder $container)
    {
        $plugin_definition = new Definition(ConfigPluginManagerAwareInitializer::class, array(
            new Reference(self::CONFIG_ID),
        ));
        $plugin_definition->addTag(ContextExtension::INITIALIZER_TAG, array('priority' => 0));
        $container->setDefinition('tdd_apigility.context_initializer', $plugin_definition);

        $config_definition = new Definition(ApigilityConfigAwareInitializer::class);
        $config_definition->addTag(ContextExtension::INITIALIZER_TAG, array('priority' => 0));
        $container->setDefinition('tdd_apigility.context_initializer_2', $config_definition);
    }
}