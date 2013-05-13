<?php

namespace Julius\RefererBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\EmbeddedDocument */
class Condition
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $operator
     *
     * @ODM\Field(name="operator", type="string")
     */
    protected $operator;

    /**
     * @var string $field
     *
     * @ODM\Field(name="field", type="string")
     */
    protected $field;

    /**
     * @var string $value
     *
     * @ODM\Field(name="value", type="string")
     */
    protected $value;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set operator
     *
     * @param string $operator
     * @return self
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * Get operator
     *
     * @return string $operator
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set field
     *
     * @param string $field
     * @return self
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Get field
     *
     * @return string $field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return string $value
     */
    public function getValue()
    {
        return $this->value;
    }
}
