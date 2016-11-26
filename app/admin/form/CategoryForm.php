<?php
namespace Thue\Admin\Form;

use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;
use Thue\Data\Model\M_Category;

class CategoryForm extends Form
{
    public function initialize($model, $option)
    {
        $name_vi = new Text('name_vi');
        $name_vi->addValidators(array(
            new PresenceOf(array(
                'message' => 'Yêu cầu nhập tiêu đề (VI)'
            ))
        ));
        $name_vi->setFilters(array('striptags', 'trim'));
        $this->add($name_vi);

        $name_en = new Text('name_en');
        $name_en->setFilters(array('striptags', 'trim'));
        $this->add($name_en);

        $slug = new Text('slug');
        $slug->addValidators(array(
            new PresenceOf(array(
                'message' => 'Yêu cầu nhập slug'
            ))
        ));
        $slug->setFilters(array('striptags', 'trim', 'lower'));
        $this->add($slug);

        $description_vi = new Textarea('description_vi');
        $description_vi->setFilters(array('trim'));
        $this->add($description_vi);

        $description_en = new Textarea('description_en');
        $description_en->setFilters(array('trim'));
        $this->add($description_en);

        $categories = M_Category::find(array(
            'conditions' => 'parent_id = :parent_id: AND status = :status:',
            'bind' => array(
                'parent_id' => 0,
                'status'    => M_Category::STATUS_ACTIVE
            )
        ));

        $parent_categories_array = array();
        $parent_categories_array[0] = '---------';

        foreach ($categories as $item) {
            $parent_categories_array[$item->category_id] = $item->name_vi;
        }

        $parent_id = new Select('parent_id', $parent_categories_array);
        $this->add($parent_id);

        $TYPE = M_Category::$TYPE;
        $type_array = array();
        foreach ($TYPE as $key => $value) {
            $type_array[$key] = $this->t->_($value);
        }

        $type = new Select('type', $type_array);
        $this->add($type);

        $ordering = new Numeric('ordering');
        $this->add($ordering);

        $STATUS = M_Category::$STATUS;
        $status_array = array();
        foreach ($STATUS as $key => $value) {
            $status_array[$key] = $this->t->_($value);
        }

        $status = new Select('status', $status_array);
        $this->add($status);

        $meta_title_vi = new Text('meta_title_vi');
        $meta_title_vi->setFilters(array('striptags', 'trim'));
        $this->add($meta_title_vi);

        $meta_title_en = new Text('meta_title_en');
        $meta_title_en->setFilters(array('striptags', 'trim'));
        $this->add($meta_title_en);
    }
}
