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
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ODM\Field(name="name", type="string")
     */
    protected $name;

    /**
     * @var string $slug
     *
     * @ODM\Field(name="slug", type="string")
     * @Gedmo\Slug(fields={"name"}, updatable=false, unique=true, separator="-")
     */
    protected $slug;

    /**
     * @var collection $conditions
     *
     * @ODM\EmbedMany(targetDocument="Julius\UserBundle\Document\Profile")
     */
    protected $conditions;

    /**
     * @var collection $documents
     *
     * @ODM\Field(name="documents", type="string")
     */
    protected $documents;

    /**
     * @var date $createdAt
     *
     * @ODM\Date()
     * @Gedmo\Timestampable(on="create")
     * @Assert\Date()
     */
    protected $createdAt;

    /**
     * @var string $createdBy
     *
     * @ODM\Field(name="createdBy", type="string")
     */
    protected $createdBy;

    /**
     * @var date $updatedAt
     *
     * @ODM\Date()
     * @Gedmo\Timestampable(on="update")
     * @Assert\Date()
     */
    protected $updatedAt;

    /**
     * @var string $updatedBy
     *
     * @ODM\Field(name="updatedBy", type="string")
     */
    protected $updatedBy;

    public function __construct()
    {
        $this->conditions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return \Content
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add conditions
     *
     * @param Julius\UserBundle\Document\Profile $conditions
     */
    public function addCondition(\Julius\UserBundle\Document\Profile $conditions)
    {
        $this->conditions[] = $conditions;
    }

    /**
    * Remove conditions
    *
    * @param <variableType$conditions
    */
    public function removeCondition(\Julius\UserBundle\Document\Profile $conditions)
    {
        $this->conditions->removeElement($conditions);
    }

    /**
     * Get conditions
     *
     * @return Doctrine\Common\Collections\Collection $conditions
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Set documents
     *
     * @param string $documents
     * @return self
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;
        return $this;
    }

    /**
     * Get documents
     *
     * @return string $documents
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return self
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedAt
     *
     * @param date $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return date $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     * @return self
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string $updatedBy
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
