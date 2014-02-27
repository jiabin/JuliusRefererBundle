<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\Doctrine\ODM;

use Julius\RefererBundle\Model\ReferableInterface;
use Julius\RefererBundle\Manager\RefererManager;
use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;

class RefererDoctrineListener
{
    /**
     * @var RefererManager $manager
     */
    protected $manager;

    /**
     * @var bool $prePersist
     */
    protected $prePersist;

    /**
     * @var bool $preUpdate
     */
    protected $preUpdate;

    /**
     * Class constructor
     */
    public function __construct(RefererManager $manager, $prePersist = true, $preUpdate = true)
    {
        $this->manager = $manager;
        $this->prePersist = $prePersist;
        $this->preUpdate = $preUpdate;
    }

    /**
     * PrePersist
     * 
     * @param LifecycleEventArgs $eventArgs
     */
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        if ($this->prePersist && php_sapi_name() != 'cli') {
            $this->preEvent($eventArgs);
        }   
    }

    /**
     * PreUpdate
     * 
     * @param LifecycleEventArgs $eventArgs
     */
    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
        if ($this->preUpdate && php_sapi_name() != 'cli') {
            $this->preEvent($eventArgs);
        }
    }

    /**
     * PreEvent
     * 
     * @param LifecycleEventArgs $eventArgs
     */
    private function preEvent(LifecycleEventArgs $eventArgs)
    {
        $document = $eventArgs->getDocument();
        if ($document instanceof ReferableInterface && $referers = $this->manager->getCurrentReferers()) {
            // Get current referers
            foreach ($referers as $referer) {
                $document->addReferer($referer);
            }
        }
    }
}