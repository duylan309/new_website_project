<?php
namespace Thue\Data\Model;

class M_Job extends BaseModel
{
    public $job_id;
    public $employer_user_id;
    public $company_branch_id;
    public $name;
    public $slug;
    public $category_ids;
    public $city_province_ids;
    public $nationality;
    public $level;
    public $type;
    public $experience;
    public $languages;
    public $salary;
    public $salary_negotiable;
    public $salary_min_vnd;
    public $salary_max_vnd;
    public $salary_min_usd;
    public $salary_max_usd;
    public $description;
    public $requirement;
    public $work_hour;
    public $benefit;
    public $keywords;
    public $hit_view;
    public $ordering;
    public $status;
    public $expired_at;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_job');

        $this->belongsTo('employer_user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserEmployer'
        ));

        $this->belongsTo('company_branch_id', '\Thue\Data\Model\M_CompanyBranch', 'company_branch_id', array(
            'foreignKey' => true,
            'alias'      => 'CompanyBranch'
        ));
    }
}
