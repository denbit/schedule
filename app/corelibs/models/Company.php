<?php

namespace Schedule\Core\Models;

class Company extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $cyr_name;

    /**
     *
     * @var string
     */
    protected $latin_name;

    /**
     *
     * @var string
     */
    protected $address;

    /**
     *
     * @var string
     */
    protected $cyr_address;

    /**
     *
     * @var string
     */
    protected $latin_address;

    /**
     *
     * @var string
     */
    protected $judicial_form;

    /**
     *
     * @var integer
     */
    protected $user;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field cyr_name
     *
     * @param string $cyr_name
     * @return $this
     */
    public function setCyrName($cyr_name)
    {
        $this->cyr_name = $cyr_name;

        return $this;
    }

    /**
     * Method to set the value of field latin_name
     *
     * @param string $latin_name
     * @return $this
     */
    public function setLatinName($latin_name)
    {
        $this->latin_name = $latin_name;

        return $this;
    }

    /**
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field cyr_address
     *
     * @param string $cyr_address
     * @return $this
     */
    public function setCyrAddress($cyr_address)
    {
        $this->cyr_address = $cyr_address;

        return $this;
    }

    /**
     * Method to set the value of field latin_address
     *
     * @param string $latin_address
     * @return $this
     */
    public function setLatinAddress($latin_address)
    {
        $this->latin_address = $latin_address;

        return $this;
    }

    /**
     * Method to set the value of field judicial_form
     *
     * @param string $judicial_form
     * @return $this
     */
    public function setJudicialForm($judicial_form)
    {
        $this->judicial_form = $judicial_form;

        return $this;
    }

    /**
     * Method to set the value of field user
     *
     * @param integer $user
     * @return $this
     */
    public function setUserId($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field cyr_name
     *
     * @return string
     */
    public function getCyrName()
    {
        return $this->cyr_name;
    }

    /**
     * Returns the value of field latin_name
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latin_name;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field cyr_address
     *
     * @return string
     */
    public function getCyrAddress()
    {
        return $this->cyr_address;
    }

    /**
     * Returns the value of field latin_address
     *
     * @return string
     */
    public function getLatinAddress()
    {
        return $this->latin_address;
    }

    /**
     * Returns the value of field judicial_form
     *
     * @return string
     */
    public function getJudicialForm()
    {
        return $this->judicial_form;
    }

    /**
     * Returns the value of field user
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("company");
        $this->hasMany('id', 'Schedule\Core\Models\ReviewsToCompany', 'company_id', ['alias' => 'ReviewsToCompany']);
        $this->hasMany('id', 'Schedule\Core\Models\Routes', 'made_by', ['alias' => 'Routes']);
        $this->hasOne('user', Users::class, 'id', ['alias' => 'user']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'company';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company[]|Company|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
