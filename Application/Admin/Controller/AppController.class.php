<?php
/**
 * 通迅录
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 9:43
 */

namespace Admin\Controller;

class AppController extends AdminController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $lists = $this->_wechat->get_app_list();
        if($lists->errcode == 0){
            $lists = $lists->agentlist;
        }
        fb(json_decode(json_encode($lists),true));
        $this->assign('lists',json_decode(json_encode($lists),true));
        $this->display();
    }

}