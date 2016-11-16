<?php
namespace Thue\Data\Model;

class MAds extends BaseModel
{
    public $ads_id;
    public $job_id;
    public $name;
    public $image;
    public $mobile_image;
    public $alt_tag;
    public $link;
    public $number_applied;
    public $number_of_pc;
    public $number_of_mobile;
    public $hit_view;
    public $position;
    public $status;
    public $expired_at;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_ads');
    }
}
