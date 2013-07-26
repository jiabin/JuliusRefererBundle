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

use Julius\RefererBundle\Model\RefererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RefererManager
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * @var string
     */
    protected $objectManagerServiceId;

    /**
     * @var string $sessionKey
     */
    protected $sessionKey;

    /**
     * @var string
     */
    protected $class;

    /**
     * Class construct
     */
    public function __construct(ContainerInterface $container, $objectManagerServiceId, $class, $sessionKey)
    {
        $this->container = $container;
        $this->objectManagerServiceId = $objectManagerServiceId;
        $this->class = $class;
        $this->sessionKey = $sessionKey;
    }

    public function getObjectManager()
    {
        return $this->container->get($this->objectManagerServiceId);
    }

    /**
     * Get object repository for referer class
     *
     * @return ObjectManager
     */
    public function getRepository()
    {
        return $this->getObjectManager()->getRepository($this->class);
    }

    /**
     * Returns current referers
     *
     * @return array Multiple RefererInterface objects
     */
    public function getCurrentReferers()
    {
        $session = $this->container->get('session');
        $referers = $session->get($this->sessionKey);

        // Return null if no matching referers found.
        if (empty($referers)) {
            return null;
        }

        // Otherwise loop through all referers
        $currentReferers = array();
        foreach ($referers as $referer) {
            $referer = $this->getRepository()->findOneById($referer);
            if (is_null($referer)) {
                throw new \Exception(sprintf("Referer not found"));
            }
            $currentReferers[] = $referer;
        }
        return $currentReferers;
    }
}