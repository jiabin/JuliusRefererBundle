<?php

namespace Julius\RefererBundle\Document;

/**
 * Julius\RefererBundle\Document\ReferredInterface
 */
interface ReferredInterface
{
    /**
     * Set referer
     *
     * @param string $referer
     * @return self
     */
    public function setReferer($referer);

    /**
     * Get referer
     *
     * @return string $referer
     */
    public function getReferer();
}
