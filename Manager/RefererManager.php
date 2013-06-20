<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\Manager;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Common\Persistence\ObjectManager;

class RefererManager
{
    /**
     * @var Session $session
     */
    protected $session;

    /**
     * @var string $sessionKey
     */
    protected $sessionKey;

    /**
     * @var ObjectManager
     */
    protected $om;

    /**
     * @var string
     */
    protected $class;

    /**
     * Class construct
     */
    public function __construct(Session $session, ObjectManager $om, $class, $sessionKey)
    {
        $this->session = $session;
        $this->om = $om;
        $this->class = $class;
        $this->sessionKey = $sessionKey;
    }

    /**
     * Get object repository for referer class
     * 
     * @return ObjectManager
     */
    public function getRepository()
    {
        return $this->om->getRepository($this->class);
    }

    /**
     * Returns current referers
     * 
     * @return array An array of RefererInterface objects
     */
    public function getCurrent()
    {
        $refererId = $this->session->get($this->sessionKey);
        if ($refererId) {
            $referer = $repo->findOneById($refererId);
            if ($referer) {
                return $referer;
            }
        }
        return null;
    }
}