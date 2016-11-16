<?php
namespace Thue\Data\Model;

class M_CityProvince extends BaseModel
{
    public $city_province_id;
    public $name_vi;
    public $name_en;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_city_province');
    }
}
