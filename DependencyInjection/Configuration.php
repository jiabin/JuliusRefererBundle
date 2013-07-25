<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('julius_referer');

        $rootNode
            ->children()
            ->scalarNode('db_driver')
                ->isRequired()
                ->validate()
                ->ifNotInArray(array('mongodb'))
                    ->thenInvalid('Invalid database driver "%s"')
                ->end()
            ->end()
            ->scalarNode('field')
                ->defaultValue('ref')
            ->end()
            ->booleanNode('doctrine_listener_enabled')
                ->defaultFalse()
            ->end();

        return $treeBuilder;
    }
}
