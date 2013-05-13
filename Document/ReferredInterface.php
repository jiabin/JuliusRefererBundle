<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

    /**
     * Set isReferable
     *
     * @param  bool $isReferable
     * @return ReferredInterface
     */
    public function setIsReferable($isReferable);

    /**
     * Get isReferable
     *
     * @return bool $isReferable
     */
    public function getIsReferable();
}
