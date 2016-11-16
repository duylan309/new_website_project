<?php
namespace Thue\Data\Model;

class M_Promotion extends BaseModel
{
    public $promotion_id;
    public $service_id;
    public $code;
    public $note;
    public $status;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_promotion');

        $this->belongsTo('service_id', '\Thue\Data\Model\M_Service', 'service_id', array(
            'foreignKey' => true,
            'alias'      => 'Service'
        ));
    }
}
