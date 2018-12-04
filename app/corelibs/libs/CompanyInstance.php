<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 21.11.2018
 * Time: 13:26
 */

namespace Schedule\Core;


use Schedule\Core\Models\Company;
use Schedule\Core\Models\Users;

class CompanyInstance extends Kernel
{
    /**
     *
     * @var string
     */
    public $login;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $u_name;

    /**
     *
     * @var string
     */
    public $l_name;
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
    protected $user_id;

    public static function findCompanyById($id): self
    {
        $c_instance = new self();
        $company = Company::findFirst($id);
        $c_instance->id = $company->getId();
        $c_instance->name = $company->getName();
        $c_instance->cyr_name = $company->getCyrName();
        $c_instance->latin_name = $company->getLatinName();
        $c_instance->address = $company->getAddress();
        $c_instance->latin_address = $company->getLatinAddress();
        $c_instance->judicial_form = $company->getJudicialForm();
        if (($user = $company->user) === false)
            $user = new Users();
        $c_instance->login = $user->getLogin();
        $c_instance->u_name = $user->getName();
        $c_instance->l_name = $user->getLName();
        return $c_instance;


    }

    public function save()
    {

    }

}