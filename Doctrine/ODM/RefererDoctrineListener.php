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

class RefererDoctrineListener
{
    /**
     * @var RefererManager $manager
     */
    protected $manager;

    /**
     * @var bool $enabled
     */
    protected $enabled;

    /**
     * Class constructor
     */
    public function __construct(RefererManager $manager, $enabled)
    {
        $this->manager = $manager;
        $this->enabled = $enabled;
    }

    public function prePersist(\Doctrine\ODM\MongoDB\Event\LifecycleEventArgs $eventArgs)
    {
        if ($this->enabled && php_sapi_name() != 'cli') {
            $document = $eventArgs->getDocument();
            if ($document instanceof ReferableInterface && $referers = $this->manager->getCurrentReferers()) {
                // Get current referers
                foreach ($referers as $referer) {
                    $document->addReferer($referer);
                }
            }
        }
    }
}