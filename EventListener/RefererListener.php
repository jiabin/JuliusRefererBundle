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

use Julius\RefererBundle\Model\Referer;
use Julius\RefererBundle\Matcher\MatcherInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

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

    /**
     * @var array
     */
    protected $matchers;

    /**
     * Class constructor
     *
     * @param string $sessionKey
     */
    public function __construct($sessionKey)
    {
        $this->sessionKey = $sessionKey;
        $this->matchers = array();
    }

    public function addMatcher(MatcherInterface $matcher)
    {
        $this->matchers[] = $matcher;
    }

    public function getMatchers()
    {
        return $this->matchers;
    }

    public function onRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $session = $request->getSession();
        //$session->remove($this->sessionKey);
        $referer = $session->get($this->sessionKey);
        print_r($referer);

        if (is_array($referer)) {
            // Referer for this session is already calculated.
            return true;
        }

        $matches = array();
        foreach ($this->matchers as $matcher) {
            if ($match = $matcher->match($request)) {
                // Store only referer id
                $matches[] = $match->getId();
            }
        }
        $session->set($this->sessionKey, $matches);
    }
}