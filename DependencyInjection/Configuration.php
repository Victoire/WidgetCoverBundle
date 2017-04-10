<?php

namespace Victoire\Widget\CoverBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('victoire_widget_cover');
        $rootNode
            ->children()
                ->arrayNode('default_styles')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('containerHeightLG')->defaultValue('400px')->end()
                        ->scalarNode('containerHeightMD')->defaultValue('350px')->end()
                        ->scalarNode('containerHeightSM')->defaultValue('250px')->end()
                        ->scalarNode('containerHeightXS')->defaultValue('150px')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
