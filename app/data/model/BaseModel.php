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
}
