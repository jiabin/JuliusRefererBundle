<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class MatcherCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('julius_referer.referer_listener')) {
            return;
        }

        $definition = $container->getDefinition(
            'julius_referer.referer_listener'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'julius_referer.matcher'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addMatcher',
                array(new Reference($id))
            );
        }
    }
}