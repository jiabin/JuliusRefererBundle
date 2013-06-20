<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\Matcher;

use Symfony\Component\HttpFoundation\Request;
use Julius\RefererBundle\Manager\RefererManager;

class SlugMatcher implements MatcherInterface
{
    /**
     * @var RefererManager
     */
    protected $manager;

    /**
     * Class constructor
     */
    public function __construct(RefererManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Return multiple matches
     * 
     * @param  Request $request
     * @param  string $field Referer field name
     * @return array
     */
    public function match(Request $request, $field)
    {
        $slug  = $request->get($field);
        $repo  = $this->manager->getRepository();
        return $repo->findOneBySlug($slug);
    }
}