<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 9:43
 */

namespace Admin\Controller;

class PublicController extends AdminController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->display('login');
    }

    public function login(){
        $this->display();
    }

    public function test(){
        /*array(
            'userid'    =>  'dazhi'
            ,'name'     =>  '大智'
            ,'department'   =>  '1'
            ,'position '    =>  '技术经理'
            ,'mobile'   =>  '15874246906'
            ,'gender'   =>  '1'
            ,'email'    =>  '631248045@qq.com'
            ,'weixinid' =>  'qz631248045'
            ,'extattr'  =>  '{"attrs":[{"name":"爱好","value":"旅游"}]}'
        );*/
        $wechat =   new \Admin\Lib\Api\WeChatApi();
        $user = $wechat->get_user_list(1);
        dump($user);
    }
}