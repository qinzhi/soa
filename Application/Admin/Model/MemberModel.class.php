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
    public function get_members($limit = 10,$offset,$where = array()){
        if(!empty($where)){
            $this->where($where);
        }
        $members = $this->limit($offset,$limit)->select();
        return $members;
    }
    public function get_total($where = array()){
        if(!empty($where)){
            $this->where($where);
        }
        return $this->count();
    }
}