<?php

namespace Julius\RefererBundle\Model;

/**
 * Julius\RefererBundle\Model\RefererInterface
 */
interface RefererInterface
{
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