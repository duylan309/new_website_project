<?php
namespace Thue\Data\Model;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;

class M_Category extends BaseModel
{
    public $category_id;
    public $parent_id;
    public $name_vi;
    public $name_en;
    public $slug;
    public $link;
    public $image;
    public $alt_image;
    public $description_vi;
    public $description_en;
    public $type;
    public $ordering;
    public $meta_title_vi;
    public $meta_title_en;
    public $meta_keywords_vi;
    public $meta_keywords_en;
    public $meta_description_vi;
    public $meta_description_en;
    public $meta_facebook_image;
    public $status;
    public $created_by;
    public $created_at;
    public $updated_by;
    public $updated_at;

    const TYPE_SINGLE_PAGE   = 1;
    const TYPE_BLOG_PAGE     = 2;
    const TYPE_CATEGORY_PAGE = 3;

    public static $TYPE = array(
        self::TYPE_SINGLE_PAGE   => 'single_page',
        self::TYPE_BLOG_PAGE     => 'blog_page',
        self::TYPE_CATEGORY_PAGE => 'category_page'
    );

    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE   = 2;
    const STATUS_DELETED  = 9;

    public static $STATUS = array(
        self::STATUS_INACTIVE => 'inactive',
        self::STATUS_ACTIVE   => 'active',
        self::STATUS_DELETED  => 'deleted'
    );

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_category');
    }

    public function validation()
    {
        // $this->validate(new \Phalcon\Validation\Validator\Uniqueness(array(
        //     'field'   => array('slug'),
        //     'message' => 'Slug này đã được sử dụng'
        // )));

        $validator = new Validation();
        $validator->add(
            [
                'slug'
            ],

            new UniquenessValidator([
                'message' => ':field này đã được sử dụng'
            ])
        );

        $this->validate($validator);

        if ($this->validationHasFailed()) {
            return false;
        }

        return true;
    }
}
