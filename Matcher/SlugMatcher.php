<?php

namespace Julius\RefererBundle\Matcher;

use Symfony\Component\HttpFoundation\Request;
use Julius\RefererBundle\Manager\RefererManager;

class SlugMatcher
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
    public function matchMulti(Request $request, $field)
    {
        $slug = $request->get($field);
        $repo = $this->manager->getRepository();
        $matches = $repo->findBySlug($slug);
        return $matches;
    }
}