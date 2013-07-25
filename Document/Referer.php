<?php

/*
 * This file is part of the JuliusRefererBundle package.
 *
 * (c) Eymen Gunay <eymen@jiabin.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Julius\RefererBundle\Document;

use Gedmo\Mapping\Annotation as Gedmo;
use Julius\RefererBundle\Model\Referer as BaseReferer;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Julius\RefererBundle\Document\Referer
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Referer extends BaseReferer
{
    /**
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @ODM\Field(name="name", type="string")
     */
    protected $name;

    /**
     * @ODM\Field(name="slug", type="string")
     * @Gedmo\Slug(fields={"name"}, updatable=false, unique=true, separator="-")
     */
    protected $slug;

    /**
     * @ODM\Date()
     * @Assert\Date()
     */
    protected $createdAt;
}
