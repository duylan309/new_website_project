<?php
namespace Thue\Data\Model;

class M_Comment extends BaseModel
{
    public $comment_id;
    public $company_id;
    public $candidate_user_id;
    public $employer_user_id;
    public $rating;
    public $content;
    public $is_read;
    public $status;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_comment');

        $this->belongsTo('candidate_user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserCandidate'
        ));

        $this->belongsTo('employer_user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'UserEmployer'
        ));
    }
}
