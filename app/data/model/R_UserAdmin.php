<?php
namespace Thue\Data\Model;

class R_UserAdmin extends BaseModel
{
    public $user_id;
    public $password;
    public $permission;
    public $status;
    public $created_at;
    public $updated_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('r_user_admin');

        $this->belongsTo('user_id', '\Thue\Data\Model\M_User', 'user_id', array(
            'foreignKey' => true,
            'alias'      => 'User'
        ));
    }
}
