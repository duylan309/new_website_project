<?php
namespace Thue\Data\Model;

use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    public function initialize()
    {
        $this->setWriteConnectionService('db');
        $this->setReadConnectionService('db_slave');
    }

    public function beforeSave()
    {
        if (isset($this->updated_at)) {
            $this->updated_at = date('Y-m-d H:i:s');
        }
    }
}
