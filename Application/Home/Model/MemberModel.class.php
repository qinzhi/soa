<?php
/**
 * Created by PhpStorm.
 * User: qinzhi
 * Date: 15-7-12
 * Time: 下午1:39
 */
namespace Home\Model;
use \Think\Model;

class MemberModel extends Model{

    function __construct(){
        parent::__construct();
    }

    function get_members($field = ''){
        if($field){
            $this->field($field);
        }
        return $this->order('letter asc')->select();
    }

    function format_members($members){
        $new_arr = array();
        foreach($members as $member){
            $alif = substr($member['letter'],0,1);
            $new_arr[$alif][] = $member;
        }
        return $new_arr;
    }
}