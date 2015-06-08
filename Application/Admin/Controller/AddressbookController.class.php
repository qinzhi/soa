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

    private $dept,$position;

    public function __construct(){
        parent::__construct();
        $this->dept =   D('Dept');
        $this->position =   D("Position");
        $this->rank = D('Rank');
    }

    public function index(){
        $this->display();
    }

    public function organ(){
        if(!empty($_POST)){
            if($_POST['type'] == 'add'){
                $this->add_dept($_POST);
            }
        }
        $this->assign('rank',$this->rank->select());
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
                ,'parentid' =>  $p_id
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

    public function position(){
        if(!empty($_POST)){
            if($_POST['type'] == 'add'){
                $this->add_position($_POST);
            }
        }
        $this->assign('position',$this->position->select());
        $this->display();
    }

    private function add_position($params){
        $this->position->create();
        $this->position->name = $params['name'];
        $this->position->status = $params['status'];
        $this->position->sort = $params['sort'];
        $this->position->remark = $params['remark'];
        $this->position->post_time = time();
        $this->position->add();
        $this->assign('exec_status',DB_EXEC_ADD_SUCCESS);
    }

    public function get_position(){
        $id = (int)$_POST['id'];
        $position   =   $this->position->find($id);
        echo is_array($position) ? json_encode($position) : '';
    }

    public function update_position(){
        if($_POST['params']){
            parse_str($_POST['params']);
        }
        if($id){
                $this->position->find($id);
                $this->position->name = $name;
                $this->position->status = $status;
                $this->position->sort = $sort;
                $this->position->remark = $remark;
                $result = $this->position->save();
                echo $result ? DB_EXEC_EDIT_SUCCESS : DB_EXEC_EDIT_FAIL;
        }else{
            echo DB_EXEC_EDIT_FAIL;
        }
    }

    public function del_position(){
        $id = (int)$_POST['id'];
        $result = $this->position->delete($id);
        echo $result ? DB_EXEC_DELETE_SUCCESS : DB_EXEC_DELETE_FAIL;
    }

    public function rank(){
        if(!empty($_POST)){
            if($_POST['type'] == 'add'){
                $this->add_rank($_POST);
            }
        }
        $this->assign('rank',$this->rank->select());
        $this->display();
    }

    private function add_rank($params){
        $this->rank->create();
        $this->rank->name = $params['name'];
        $this->rank->status = $params['status'];
        $this->rank->sort = $params['sort'];
        $this->rank->remark = $params['remark'];
        $this->rank->post_time = time();
        $this->rank->add();
        $this->assign('exec_status',DB_EXEC_ADD_SUCCESS);
    }

    public function get_rank(){
        $id = (int)$_POST['id'];
        $position   =   $this->rank->find($id);
        echo is_array($position) ? json_encode($position) : '';
    }

    public function update_rank(){
        if($_POST['params']){
            parse_str($_POST['params']);
        }
        if($id){
            $this->rank->find($id);
            $this->rank->name = $name;
            $this->rank->status = $status;
            $this->rank->sort = $sort;
            $this->rank->remark = $remark;
            $result = $this->rank->save();
            echo $result ? DB_EXEC_EDIT_SUCCESS : DB_EXEC_EDIT_FAIL;
        }else{
            echo DB_EXEC_EDIT_FAIL;
        }
    }

    public function del_rank(){
        $id = (int)$_POST['id'];
        $result = $this->rank->delete($id);
        echo $result ? DB_EXEC_DELETE_SUCCESS : DB_EXEC_DELETE_FAIL;
    }
}