<?php
namespace Thue\Data\Model;

class M_Company extends BaseModel
{
    public $company_id;
    public $employer_user_id;
    public $category_ids;
    public $name;
    public $slug;
    public $image;
    public $banner;
    public $phone;
    public $address;
    public $website;
    public $city_province_id;
    public $district_id;
    public $lat;
    public $lng;
    public $about;
    public $size;
    public $facebook_url;
    public $facebook_cover;
    public $facebook_load_newsfeed;
    public $facebook_load_photo;
    public $status;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_company');

        $this->belongsTo('employer_user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserEmployer'
        ));

        $this->belongsTo('city_province_id', '\Thue\Data\Model\M_CityProvince', 'city_province_id', array(
            'foreignKey' => true,
            'alias'      => 'CityProvince'
        ));

        $this->belongsTo('district_id', '\Thue\Data\Model\M_District', 'district_id', array(
            'reusable' => true,
            'alias'    => 'District'
        ));
    }
}
