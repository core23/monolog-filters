<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Bridge\Symfony\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('core23_monolog');

        // Keep compatibility with symfony/config < 4.2
        if (!\method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->root('core23_monolog');
        } else {
            $rootNode = $treeBuilder->getRootNode();
        }

        $this->addLoggingSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addLoggingSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('handlers')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('action_level')->defaultValue('WARNING')->end()
                        ->arrayNode('excluded_404s')
                            ->canBeUnset()
                            ->defaultValue(['^/'])
                            ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
