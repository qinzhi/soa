<?php
/**
 * 微信API
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:52
 */

namespace   Admin\Lib\Api;
use Think\Model;

class WeatherApi extends Model{

    function __construct(){

    }

    function get_weather(){
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        $ip =   '175.10.239.240';
        $httpstr    =   http('http://api.36wu.com/Weather/GetWeatherByIp',array('ip'=>$ip),'get');
        return json_decode($httpstr);
    }


}