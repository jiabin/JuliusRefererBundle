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

use Doctrine\Common\Collections\ArrayCollection;

interface ReferableInterface
{
    /**
     * Add referer
     *
     * @param  RefererInterface
     * @return self
     */
    public function addReferer(RefererInterface $referer);

    /**
     * Remove referer
     *
     * @param  RefererInterface
     * @return self
     */
    public function removeReferer(RefererInterface $referer);

    /**
     * Has referer
     *
     * @param  RefererInterface
     * @return self
     */
    public function hasReferer(RefererInterface $referer);

    /**
     * Get referers
     * 
     * @return ArrayCollection
     */
    public function getReferers();
}