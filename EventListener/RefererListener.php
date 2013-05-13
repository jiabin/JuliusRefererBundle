<?php

namespace Julius\RefererBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Julius\RefererBundle\Model\Referer;

class RefererListener
{
    /**
     * @var string
     */
    protected $sessionKey;

    /**
     * @var string
     */
    protected $field;

    public function __construct($matcher, $sessionKey, $field)
    {
        $this->matcher = $matcher;
        $this->sessionKey = $sessionKey;
        $this->field = $field;
    }

    public function onRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $session = $request->getSession();
        $referers = $session->get($this->sessionKey);

        if ($referers) return true;

        if ($request->get($this->field)) {
            $matches = $this->matcher->matchMulti($request, $this->field) ?: array();
            foreach ($matches as $match) {
                $referers[] = $match->getId();
            }
        } else {
            $referers = array(Referer::NONE);
        }
        $session->set($this->sessionKey, $referers);
    }
}