<?php
namespace Thue\Data\Model;

class M_District extends BaseModel
{
    public $district_id;
    public $city_province_id;
    public $name_vi;
    public $name_en;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_district');

        $this->belongsTo('city_province_id', '\Thue\Data\Model\M_CityProvince', 'city_province_id', array(
            'foreignKey' => true,
            'alias'      => 'CityProvince'
        ));
    }
}
