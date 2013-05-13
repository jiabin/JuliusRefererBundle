<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ConditionType
 */
class ConditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('operator', 'choice', array(
            'choices' => array(
                'and' => 'And',
                'or' => 'Or'
            ),
            'expanded' => false
        ));
        $builder->add('field', 'choice', array(
            'choices' => array(
                'url' => 'URL',
                'http_referer' => 'HTTP Referer'
            )
        ));
        $builder->add('value', 'text', array());
    }

    public function getName()
    {
        return 'condition';
    }
}