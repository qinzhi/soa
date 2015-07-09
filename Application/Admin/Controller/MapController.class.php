<?php
/**
 * 通迅录
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 9:43
 */

namespace Admin\Controller;

class MapController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->map =   D('Map');
    }

    public function index(){
        if(!empty($_POST)){
            if($_POST['type'] == 'add'){
                $this->add_map($_POST);
            }
        }
        $map = $this->map->select();
        $tree = new \Admin\Lib\Org\Util\Tree($map);
        $maps = $tree->leaf();
        $this->assign('maps',$maps);
        $this->display();
    }

    public function get_map(){
        $id = (int)$_POST['id'];
        $map   =   $this->map->find($id);
        echo is_array($map) ? json_encode($map) : '';
    }
    
    public function add_map($params){

        $level = $this->map->get_level((int)$params['p_id']);

        if($level <=3 && $level > 0){
            $data = array(
                'name' => trim($params['name']),
                'site' => trim($params['site']),
                'icon' => trim($params['icon']),
                'sort' => trim($params['sort']),
                'pid' => (int)$params['p_id'],
                'level' => $level,
                'post_time' => time()
            );
            $result = $this->map->add($data);
            $result ? $this->del_cache_maps() : '';
        }else{
            $this->assign('exec_status',DB_EXEC_ADD_FAIL);
            $this->assign('err_msg','最大分类不能超过三级');
        }
    }

    public function update_map(){
        if($_POST['params']){
            parse_str($_POST['params']);
            $level = $this->map->get_level((int)$p_id);
            if($level <=3 && $level > 0){
                $data = array(
                    'id' => (int)$id,
                    'name' => trim($name),
                    'site' => trim($site),
                    'icon' => trim($icon),
                    'sort' => trim($sort),
                    'pid' => (int)$p_id,
                    'level' => $level
                );
                $result = $this->map->save($data);
                $result ? $this->del_cache_maps() : '';
                echo DB_EXEC_EDIT_SUCCESS;
            }else{
                echo DB_EXEC_EDIT_FAIL;
            }
        }

    }

    private function del_cache_maps(){
        $maps = S('admin_site_map');
        if(!empty($maps)){
            S('admin_site_map',NULL);
        }
    }



}