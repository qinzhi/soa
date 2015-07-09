<?php

namespace Admin\Behavior;
use Think\Behavior;

defined('THINK_PATH') or exit();

class TplSideBehavior extends Behavior {
    public function run(&$params) {
        //个人数据
        /*$maps = $this->get_maps();
        $tree = new \Admin\Lib\Org\Util\Tree($maps);
        $slideBar = $tree->leaf();*/

        //fb($params);
    }
    private function get_maps(){
        $maps = S('admin_site_map');
        if(!empty($maps)){
            return json_decode($maps,true);
        }else{
            $maps = D('Map')->get_maps();
            !empty($maps) ? S('admin_site_map',json_encode($maps),pow(2,31)-1):'';
            return $maps;
        }
    }

}
?>