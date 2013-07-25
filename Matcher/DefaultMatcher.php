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

use Julius\RefererBundle\Manager\RefererManager;
use Symfony\Component\HttpFoundation\Request;

class DefaultMatcher implements MatcherInterface
{
    /**
     * @var RefererManager $manager
     */
    protected $manager;

    /**
     * @var string
     */
    protected $field;

    /**
     * Class constructor
     *
     * @param string $field
     */
    public function __construct(RefererManager $manager, $field)
    {
        $this->manager = $manager;
        $this->field = $field;
    }

    /**
     * Return multiple matches
     *
     * @param  Request $request
     * @return RefererInterface
     */
    public function match(Request $request)
    {
        $slug = $request->get($this->field);
        if ($slug) {
            $repo  = $this->manager->getRepository();
            return $repo->findOneBySlug($slug);
        }
        return null;
    }
}