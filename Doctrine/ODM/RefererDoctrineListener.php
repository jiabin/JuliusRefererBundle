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

use Julius\RefererBundle\Document\ReferredInterface;

class RefererDoctrineListener
{
    public function prePersist(\Doctrine\ODM\MongoDB\Event\LifecycleEventArgs $eventArgs)
    {
        $document = $eventArgs->getDocument();
        if ($document instanceof ReferredInterface && $document->getIsReferable()) {
            $document->setReferer($referer);
        }
    }
}