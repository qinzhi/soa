<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller {

    private $_weather    =   array();    //天气

    public $_wechat;    //微信

    public function __construct(){
        parent::__construct();

        $this->_wechat  =   new \Admin\Lib\Api\WeChatApi();
        $weatherObj =   new \Admin\Lib\Api\WeatherApi();
        $this->_weather =   $weatherObj->get_weather();
        $this->assign('weather',$this->_weather);
    }

    public function index(){

    }
}