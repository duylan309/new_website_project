<?php
namespace Thue\Data\Model;

class M_ServiceCategory extends BaseModel
{
    public $service_category_id;
    public $name_vi;
    public $name_en;
    public $status;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_service_category');
    }
}
