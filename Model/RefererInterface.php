<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\Model;

/**
 * Julius\RefererBundle\Model\RefererInterface
 */
interface RefererInterface
{
    const NONE = 'none';

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId();

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName();

    /**
     * Set slug
     *
     * @param string $slug
     * @return \Content
     */
    public function setSlug($slug);

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug();
}