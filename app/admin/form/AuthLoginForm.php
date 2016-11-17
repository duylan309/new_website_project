<?php
namespace Thue\Admin\Form;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class AuthLoginForm extends Form
{
    public function initialize($model, $option)
    {
        if ($model) {}
        if ($option) {}

        $email = new Text('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Yêu cầu nhập email đăng nhập'
            )),
            new Email(array(
                'message' => 'Email không hợp lệ'
            ))
        ));
        $email->setFilters(array('striptags', 'trim', 'lower'));
        $this->add($email);

        $password = new Password('password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Yêu cầu nhập mật khẩu'
            ))
        ));
        $password->setFilters(array('trim'));
        $this->add($password);
    }
}
