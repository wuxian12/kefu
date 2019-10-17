<?php
namespace app\service\controller;

use think\Controller;

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty(cookie('l_user_name'))){

            $this->redirect(url('login/index'));
        }
        $this->assign([
            'version' => config('web.version'),
            'socket' => config('web.socket')
        ]);

    }
}