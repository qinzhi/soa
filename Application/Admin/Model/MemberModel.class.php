<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class MemberModel extends CommonModel{
    public function get_members($limit = 10,$offset,$search = array()){
        if(!empty($search)){

        }
        return $this->limit($offset,$limit)->select();
    }
    public function get_total($search = array()){
        if(!empty($search)){

        }
        return $this->count();
    }
}