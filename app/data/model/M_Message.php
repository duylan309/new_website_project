<?php
namespace Thue\Data\Model;

class M_Message extends BaseModel
{
    public $message_id;
    public $parent_id;
    public $employer_user_id;
    public $candidate_user_id;
    public $company_id;
    public $subject;
    public $content;
    public $is_important;
    public $status;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_message');

        $this->belongsTo('employer_user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserEmployer'
        ));

        $this->belongsTo('candidate_user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserCandidate'
        ));

        $this->belongsTo('company_id', '\Thue\Data\Model\M_Company', 'company_id', array(
            'foreignKey' => true,
            'alias'      => 'Company'
        ));
    }
}
