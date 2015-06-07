<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class DeptModel extends CommonModel{
    public function get_depts(){
        $depts = $this->select();
        $tree = new \Admin\Lib\Org\Util\Tree($depts);
        $depts = $tree->leaf();
        return $depts;
    }
}