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

interface MatcherInterface
{
    /**
     * Match referer
     * 
     * @param  Request $request
     * @param  string  $field   Referer field name
     * @return string
     */
    public function match(Request $request, $field);
}