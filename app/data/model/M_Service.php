<?php
namespace Thue\Data\Model;

class M_Service extends BaseModel
{
    public $service_id;
    public $service_category_id;
    public $name_vi;
    public $name_en;
    public $jobs_left;
    public $total_pages;
    public $price;
    public $status;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_service');

        $this->belongsTo('service_category_id', '\Thue\Data\Model\M_ServiceCategory', 'service_category_id', array(
            'foreignKey' => true,
            'alias'      => 'ServiceCategory'
        ));
    }
}
