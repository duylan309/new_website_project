<?php
namespace Thue\Data\Model;

class M_StaticPage extends BaseModel
{
    public $static_page_id;
    public $category_id;
    public $company_branch_id;
    public $job_ids;
    public $name_vi;
    public $name_en;
    public $slug;
    public $subject;
    public $salary;
    public $type;
    public $level;
    public $experience;
    public $languages;
    public $ordering;
    public $status;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_static_page');

        $this->belongsTo('category_id', '\Thue\Data\Model\M_Category', 'category_id', array(
            'foreignKey' => true,
            'alias'      => 'Category'
        ));

        $this->belongsTo('company_branch_id', '\Thue\Data\Model\M_CompanyBranch', 'company_branch_id', array(
            'foreignKey' => true,
            'alias'      => 'CompanyBranch'
        ));
    }
}
