<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        $referer = $session->get($this->sessionKey);

        if ($referer) return true;
        $referer = Referer::NONE;

        if ($request->get($this->field)) {
            $match = $this->matcher->match($request, $this->field);
            if ($match) {
                $referer = $match->getId();
            }
        }
        $session->set($this->sessionKey, $referer);
    }
}