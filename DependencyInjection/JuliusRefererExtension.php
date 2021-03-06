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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class JuliusRefererExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $bundles = $container->getParameter('kernel.bundles');

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $loader->load($config['db_driver'] . '.xml');

        // SonataAdminBundle integration
        if (isset($bundles['SonataAdminBundle'])) {
            $loader->load('admin.xml');   
        }

        $container->setParameter('julius_referer.field', $config['field']);
        $container->setParameter('julius_referer.listeners.persist', $config['listeners']['persist']);
        $container->setParameter('julius_referer.listeners.update', $config['listeners']['update']);
    }
}
