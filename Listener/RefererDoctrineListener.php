<?php

namespace Julius\RefererBundle\Listener;

class RefererDoctrineListener
{
    public function preUpdate(\Doctrine\ODM\MongoDB\Event\LifecycleEventArgs $eventArgs)
    {
        $document = $eventArgs->getDocument();
        print_r(get_class($document));
        die;
    }
}