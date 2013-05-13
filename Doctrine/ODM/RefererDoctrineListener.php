<?php

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