<?php

namespace Dwo\ConfigPrototypeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author David Wolter <david@lovoo.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dwo_config_prototype');

        $rootNode
            ->children()

                ->arrayNode('prototypes')
                    ->useAttributeAsKey('prototype')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('prototype_path')->isRequired()->end()
                                ->scalarNode('configuration_class')->isRequired()->end()
                                ->scalarNode('manager')->isRequired()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()

            ->end();

        return $treeBuilder;
    }
}