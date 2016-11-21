<?php
namespace Thue\Data\Model;

class M_Category extends BaseModel
{
    public $category_id;
    public $parent_id;
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
    public $created_by;
    public $created_at;
    public $updated_at;

    const TYPE_RESTAURANT   = 1;
    const TYPE_COFFEE_SHOP  = 2;

    public static $TYPE = array(
        self::TYPE_RESTAURANT  => 'restaurant',
        self::TYPE_COFFEE_SHOP => 'coffee_shop'
    );

    const IS_SINGLE_PAGE     = 1;
    const IS_NOT_SINGLE_PAGE = 0;

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 2;

    public static $STATUS = array(
        self::STATUS_ACTIVE   => 'active',
        self::STATUS_INACTIVE => 'inactive'
    );

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_category');
    }

    public function validation()
    {
        $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
            'field'   => array('slug'),
            'message' => 'Slug này đã được sử dụng'
        )));

        if ($this->validationHasFailed()) {
            return false;
        }

        return true;
    }
}
