<?php
namespace Thue\Data\Model;

class R_CandidateSaved extends BaseModel
{
    public $candidate_user_id;
    public $employer_user_id;
    public $status;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('r_candidate_saved');

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
