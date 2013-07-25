<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Julius\RefererBundle\DependencyInjection\Compiler\MatcherCompilerPass;

class JuliusRefererBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
    	parent::build($container);
        $container->addCompilerPass(new MatcherCompilerPass);
    }
}
