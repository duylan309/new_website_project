<?php
namespace Thue\Data\Model;

class M_Category extends BaseModel
{
    public $category_id;
    public $parent_id;
    public $admin_user_id;
    public $name_vi;
    public $name_en;
    public $slug;
    public $link;
    public $image;
    public $description_vi;
    public $description_en;
    public $html_content_vi;
    public $html_content_en;
    public $type;
    public $is_single_page;
    public $ordering;
    public $status;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_category');

        $this->belongsTo('admin_user_id', '\Thue\Data\Model\R_UserAdmin', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserAdmin'
        ));
    }
}
