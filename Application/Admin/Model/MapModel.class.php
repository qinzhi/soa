<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class MapModel extends CommonModel{

    public function get_level($id){
        if(empty($id)){
            return 1;
        }else{
            $map = $this->get_map($id);
            if(!empty($map) && $map['level'] <= 2){
                return ++$map['level'];
            }else{
                return 0;
            }
        }
    }

    public function get_map($id){
        return $this->where("id=$id")->find();
    }

    public function get_maps(){
        $maps = $this->select();
        $new_maps = array();
        foreach($maps as $value){
            $new_maps[$value['id']] = $value;
        }
        return $new_maps;
    }

    public function get_total($search = array()){
        if(!empty($search)){

        }
        return $this->count();
    }
}