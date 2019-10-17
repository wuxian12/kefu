<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public function __construct()
    {
    	parent::__construct();

        if(empty(cookie('user_name'))){
            $this->redirect(url('login/index'));
        }
        $this->assign([
            'version' => config('web.version')
        ]);

    }
}
