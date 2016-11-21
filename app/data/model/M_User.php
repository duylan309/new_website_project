<?php
namespace Thue\Data\Model;

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

    const TYPE_CANDIDATE = 1;
    const TYPE_EMPLOYER  = 2;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_user');

        $this->belongsTo('city_province_id', '\Thue\Data\Model\M_CityProvince', 'city_province_id', array(
            'reusable' => true,
            'alias'    => 'CityProvince'
        ));
    }

    public function validation()
    {
        $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
            'field'   => array('email', 'type', 'status'),
            'message' => 'Email này đã được sử dụng'
        )));

        if ($this->validationHasFailed()) {
            return false;
        }

        return true;
    }
}
