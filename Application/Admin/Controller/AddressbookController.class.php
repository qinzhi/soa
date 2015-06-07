<?php
/**
 * 通迅录
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 9:43
 */

namespace Admin\Controller;

class AddressbookController extends AdminController {

    private $dept;

    public function __construct(){
        parent::__construct();
        $this->dept =   D('Dept');
    }

    public function index(){
        $this->display();
    }

    public function frame(){
        if(!empty($_POST)){
            if($_POST['type'] == 'add'){
                $this->add_dept($_POST);
            }
        }
        $this->assign('depts',$this->dept->get_depts());
        $this->display();
    }

    public function get_dept(){
        $id = (int)$_POST['id'];
        $dept   =   $this->dept->find($id);
        echo is_array($dept) ? json_encode($dept) : '';
    }

    private function add_dept($params){

        $this->dept->create();
        $this->dept->name = $params['name'];
        $this->dept->letter =   get_letter($this->dept->name);
        $this->dept->short_name = $params['short_name'];
        $this->dept->dept_grade_id = $params['grade_id'];
        $this->dept->pid = $params['p_id'];
        $this->dept->sort = $params['sort'];
        $this->dept->remark = $params['remark'];
        $this->dept->post_time = time();
        $last_id = $this->dept->add();


        if($last_id>0){
            $data   =   array(
                'name'  =>  $params['name']
                ,'parentid' =>  empty($params['p_id']) ? 1 : $params['p_id']
                ,'order'    =>  $params['sort']
                ,'id'   =>  $last_id
            );
            $this->_wechat->create_department($data);

            $this->assign('exec_status',DB_EXEC_ADD_SUCCESS);
        }
    }

    public function update_dept(){
        if($_POST['params']){
            parse_str($_POST['params']);
        }
        if($id){
            $data   =   array(
                'id'   =>  $id
                ,'name'  =>  $name
                ,'parentid' =>  empty($p_id) ? 1 : $p_id
                ,'order'    =>  $sort
            );
            $result = $this->_wechat->update_department($data);
            if($result->errcode == 0){
                $this->dept->find($id);
                $this->dept->name = $name;
                $this->dept->letter =   get_letter($this->dept->name);
                $this->dept->short_name = $short_name;
                $this->dept->dept_grade_id = $grade_id;
                $this->dept->pid = $p_id;
                $this->dept->sort = $sort;
                $this->dept->remark = $remark;
                $this->dept->save();
                echo DB_EXEC_EDIT_SUCCESS;
            }
        }else{
            echo DB_EXEC_EDIT_FAIL;
        }

    }

    public function del_dept(){
        $id = (int)$_POST['id'];
        $result = $this->_wechat->delete_department($id);
        if($result->errcode == 0){
            $this->dept->delete($id);
            echo DB_EXEC_DELETE_SUCCESS;
        }else{
            echo DB_EXEC_DELETE_FAIL;
        }
    }
}