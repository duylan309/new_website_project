<?php
namespace Thue\Data\Model;

class M_CompanyBranch extends BaseModel
{
    public $company_branch_id;
    public $company_id;
    public $name;
    public $address;
    public $city_province_id;
    public $district_id;
    public $lat;
    public $lng;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_company_branch');

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
