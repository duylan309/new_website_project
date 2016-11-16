<?php
namespace Thue\Data\Model;

use Phalcon\Mvc\Model\Validator\Uniqueness;

class M_User extends BaseModel
{
    public $user_id;
    public $parent_user_id;
    public $email;
    public $password;
    public $facebook_id;
    public $facebook_email;
    public $name;
    public $image;
    public $birthday;
    public $gender;
    public $phone;
    public $address;
    public $city_province_id;
    public $country;
    public $lat;
    public $lng;
    public $is_newsletter_registered;
    public $is_email_received;
    public $days_left;
    public $jobs_left;
    public $total_pages;
    public $signup_by;
    public $type;
    public $status;
    public $is_deleted;
    public $logined_at;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_user');
    }

    public function validation()
    {
        $this->validate(new Uniqueness(array(
            'field'   => array('email', 'status'),
            'message' => 'Email này đã được sử dụng'
        )));

        if ($this->validationHasFailed()) {
            return false;
        }

        return true;
    }
}
