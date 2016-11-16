<?php
namespace Thue\Data\Model;

class M_Contact extends BaseModel
{
    public $contact_id;
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $content;
    public $status;
    public $created_at;

    public function initialize()
    {
        parent::initialize();
        $this->setSource('m_contact');
    }
}
