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

class WeChatApi extends Model{

    /**
     * 微信推送过来的数据或响应数据
     * @var array
     */
    protected $data   =   array();

    /**
     * 主动发送的数据
     * @var array
     */
    protected $send   =   array();

    /**
     * api  url
     * @var array
     */
    protected $api_url  =  array();

    protected $access_token = '';
    /**
     * 接口地址
     * @var string
     */
    protected $url    =   '';

    function __construct(){
        $this->CORPID   =   'wx755896948c0fb82d';
        $this->SECRET   =   '_coTBTWxo6RiJ04UE3pMnUvmLzeBpSJlVo9ffzK3K092X-8REVUnFFJcf8zQkn40';
        $this->api_url  =   C('WEIXIN_API_URL');
        $this->access_token = $this->getToken();
    }

    /**
     * 获取保存的accesstoken
     */
    private function getToken(){
        $stoken = S ( 'S_TOKEN'); // 从缓存获取ACCESS_TOKEN

        if (is_array ($stoken)&&!empty($stoken['token'])) {
            $nowtime = time ();
            $difftime = $nowtime - $stoken ['tokentime']; // 判断缓存里面的TOKEN保存了多久；
            if ($difftime > 7000) { // TOKEN有效时间7200 判断超过7000就重新获取;
                $accesstoken = $this->getAcessToken(); // 去微信获取最新ACCESS_TOKEN
                $stoken ['tokentime'] = time ();
                $stoken ['token'] = $accesstoken;
                S ( 'S_TOKEN', $stoken, 7000); // 放进缓存
            } else {
                $accesstoken = $stoken ['token'];
            }
        } else {
            $accesstoken = $this->getAcessToken(); // 去微信获取最新ACCESS_TOKEN
            $stoken ['tokentime'] = time ();
            $stoken ['token'] = $accesstoken;
            S ('S_TOKEN', $stoken); // 放进缓存
        }

        return $accesstoken;
    }

    /**
     * 重新从微信获取accesstoken
     */

    private function getAcessToken() {
        //$appid = C ( 'WECHAT_APPID' );
        //$appsecret = C ( 'WECHAT_APPSECRET' );

        $this->url = $this->get_url('access_token');
        $params = array ();
        $params ['grant_type'] = 'client_credential';
        $params ['corpid'] = $this->CORPID;
        $params ['corpsecret'] = $this->SECRET;
        $httpstr = http($this->url,$params);
        $harr = json_decode ( $httpstr, true );
        return $harr ['access_token'];
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////
/**********************************************  管理通讯录  *******************************************************************/

    /**
     * 获取部门列表
     * @param $id   部门id。获取指定部门id下的子部门
     * @return int|mixed
     * @throws \Exception
     */
    public function get_department_list($id){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'id'    =>  $id
        );
        $dataStr    =   $this->format_params($this->send,'get');

        $this->data = http($this->url,$dataStr,'get');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 创建部门
     * @param $send 发送的数据
     * @return int|mixed
     * @throws \Exception
     */
    public function create_department($send){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send = $send;

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr,'post');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 更新部门
     * @param $send 发送的数据
     * @return int|mixed
     * @throws \Exception
     */
    public function update_department($send){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send = $send;

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr,'post');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 删除部门
     * @param $id   部门id。（注：不能删除根部门；不能删除含有子部门、成员的部门）
     * @return int|mixed
     * @throws \Exception
     */
    public function delete_department($id){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'id'    =>  $id
        );
        $dataStr    =   $this->format_params($this->send,'get');

        $this->data = http($this->url,$dataStr,'get');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }


    /**
     * 获取成员
     * @param $userid   成员UserID。对应管理端的帐号，企业内必须唯一。长度为1~64个字节
     * @return int|mixed
     * @throws \Exception
     */
    public function get_user($userid){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'userid'    =>  $userid
        );
        $dataStr    =   $this->format_params($this->send,'get');

        $this->data = http($this->url,$dataStr,'get');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 获取部门成员
     * @param $department_id    获取的部门id
     * @param int $fetch_child  1/0：是否递归获取子部门下面的成员
     * @param int $status   0获取全部成员，1获取已关注成员列表，2获取禁用成员列表，4获取未关注成员列表。status可叠加
     * @return int|mixed
     * @throws \Exception
     */
    public function get_user_simpleList($department_id , $fetch_child = 0 , $status = 0){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'department_id' => $department_id,
            'fetch_child' => $fetch_child,
            'status' => $status
        );
        $dataStr    =   $this->format_params($this->send,'get');

        $this->data = http($this->url,$dataStr,'get');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 获取部门成员
     * @param $department_id    获取的部门id
     * @param int $fetch_child  1/0：是否递归获取子部门下面的成员
     * @param int $status   0获取全部成员，1获取已关注成员列表，2获取禁用成员列表，4获取未关注成员列表。status可叠加
     * @return int|mixed
     * @throws \Exception
     */
    public function get_user_list($department_id , $fetch_child = 0 , $status = 0){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'department_id' => $department_id,
            'fetch_child' => $fetch_child,
            'status' => $status
        );
        $dataStr    =   $this->format_params($this->send,'get');

        $this->data = http($this->url,$dataStr,'get');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 邀请成员关注
     * @param $userid   成员UserID。对应管理端的帐号
     * @return int|mixed
     * @throws \Exception
     */
    public function invite_send($userid){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'userid' => $userid
        );
        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr);

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 创建成员
     * @param $send 发送的数据
     * @return int|mixed
     * @throws \Exception
     */
    public function create_user($send){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send = $send;

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr,'post');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 更新成员
     * @param $send 发送的数据
     * @return int|mixed
     * @throws \Exception
     */
    public function update_user($send){
        $this->url  = $this->get_url(__FUNCTION__);
        $this->send = $send;

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr,'post');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 删除成员
     * @param $userid   成员UserID。对应管理端的帐号
     * @return int|mixed
     * @throws \Exception
     */
    public function delete_user($userid){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'userid'    =>  $userid
        );

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr);
        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /**
     * 批量删除成员
     * @param $useridlist   成员UserID列表。对应管理端的帐号
     * @return int|mixed
     * @throws \Exception
     */
    public function bat_delete_user($useridlist){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'useridlist'    =>  json_encode($useridlist)
        );

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr);
        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }


    ////////////////////////////////////////////  end //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**********************************************  企业号应用  *******************************************************************/

    public function get_app($agentid){
        $this->url = $this->get_url(__FUNCTION__);
        $this->send =   array(
            'agentid' => $agentid
        );
        $dataStr    =   $this->format_params($this->send,'get');

        $this->data = http($this->url,$dataStr);

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    public function set_app($send){
        $this->url  = $this->get_url(__FUNCTION__);
        $this->send = $send;

        $dataStr    =   $this->format_params($this->send);

        $this->data = http($this->url,$dataStr,'post');

        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    public function get_app_list(){
        $this->url = $this->get_url(__FUNCTION__);
        $dataStr    =   $this->format_params(array(),'get');

        $this->data = http($this->url,$dataStr);
        $result =    $this->verify_data($this->data,__FUNCTION__);
        return $result;
    }

    /////////////////////////////////////////////  end  ///////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**********************************************    *******************************************************************/

    /**
     * 格式参数
     * @param $send 发送的数据
     * @param string $method
     * @return array|string
     */
    public function format_params($send = array(),$method = 'post'){
        $send   =   array_merge($send,array(
            'access_token' =>  $this->access_token
        ));
        if($method == post){
            $this->url .= '?access_token=' . $this->ACCESS_TOKEN;
            return json_encode($send, JSON_UNESCAPED_UNICODE);
        }else
            return $send;
    }

    /**
     * api url
     * @param $key
     * @return mixed
     */
    public function get_url($key){
        $url  =   $this->api_url[$key];
        return $url;
    }

    /**
     * 验证数据
     * @param $data 响应数据
     * @param $method
     * @return int|mixed
     */
    public function verify_data($data,$method){
        if(empty($data)){
            return -1;
        }
        $data   =   json_decode($data);
        if($data->errcode != 0){
            $err    =   array(
                'errcode'   =>  $data->errcode
                ,'errmsg'    =>  $data->errmsg
                ,'api_url'  =>  $this->url
                ,'data' =>  $this->send
                ,'function' =>  $method
                ,'post_time'    =>  time()
            );
            M('Api_log')->add($err);
        }
        return $data;
    }


}