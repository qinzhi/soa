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

    private $dept,$position,$rank,$member;

    public function __construct(){
        parent::__construct();
        $this->dept =   D('Dept');
        $this->position =   D("Position");
        $this->rank = D('Rank');
        $this->member = D('Member');
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

    public function member(){
        if(!empty($_POST)){
            if($_POST['type'] == 'add'){
                $this->add_member($_POST);
            }
        }
        $page = !empty($_POST['page']) ? (int)$_POST['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $total = $this->member->get_total();
        $page_num = ceil( $total / $limit );
        $members = $this->member->get_members($offset,$limit);
        $this->assign('page_num',$page_num);
        $this->assign('members',$members);
        $this->assign('position',$this->position->select());
        $this->assign('depts',$this->dept->get_depts());
        $this->display();
    }

    public function get_member(){
        $id = (int)$_POST['id'];
        $member   =   $this->member->find($id);
        echo is_array($member) ? json_encode($member) : '';
    }

    public function add_member($params){
        $data = array(
            'userid' => $params['account'],
            'name' => $params['name'],
            'department' => $params['dept_id'],//$params['dept_id'],
            'mobile' => $params['mobile_tel'],
            'position' => $params['position'],
            'gender' => $params['sex'],
            'email' => $params['email'],
            'weixinid' => $params['weixinid']
        );
        $result = $this->_wechat->create_user($data);
        if($result->errcode == 0){
            $this->member->create();
            $this->member->name = $params['name'];
            $this->member->account = $params['account'];
            $this->member->dept_id  =$params['dept_id'];
            $this->member->position_id = $params['position_id'];
            $this->member->position_str = $params['position'];
            $this->member->letter = get_letter($this->member->name);
            $this->member->avatar = $params['avatar'];
            $this->member->email = $params['email'];
            $this->member->qq = $params['qq'];
            $this->member->weixinid = $params['weixinid'];
            $this->member->office_tel = $params['office_tel'];
            $this->member->mobile_tel = $params['mobile_tel'];
            $this->member->sex = $params['sex'];
            $this->member->birthday = $params['birthday'];
            $this->member->site = $params['site'];
            $this->member->duty = $params['duty'];
            $this->member->status = $params['status'];
            $this->member->post_time = time();
            $this->member->update_time = time();
            $this->member->add();
            $this->assign('exec_status',DB_EXEC_ADD_SUCCESS);
        }else{
            $this->assign('exec_status',DB_EXEC_ADD_FAIL);
        }
    }

    public function update_member(){
        if($_POST['params']){
            parse_str($_POST['params']);
        }
        if($id){
            $data   =   array(
                'userid' => $account,
                'name' => $name,
                'department' => $dept_id,//$params['dept_id'],
                'mobile' => $mobile_tel,
                'position' => $position,
                'gender' => trim($sex),
                'enable' => trim($status),
                'email' => $email,
                'weixinid' => trim($weixinid)
            );
            $result = $this->_wechat->update_user($data);
            if($result->errcode == 0){
                $this->member->find($id);
                $this->member->name = $name;
                $this->member->account = $account;
                $this->member->dept_id  = $dept_id;
                $this->member->position_id = $position_id;
                $this->member->position_str= $position;
                $this->member->letter = get_letter($this->member->name);
                $this->member->avatar = $avatar;
                $this->member->email = $email;
                $this->member->qq = $qq;
                $this->member->weixinid = $weixinid;
                $this->member->office_tel = $office_tel;
                $this->member->mobile_tel = $mobile_tel;
                $this->member->sex = $sex;
                $this->member->birthday = $birthday;
                $this->member->site = $site;
                $this->member->duty = $duty;
                $this->member->status = $status;
                $this->member->update_time = time();
                $this->member->save();
                echo DB_EXEC_EDIT_SUCCESS;
            }else{
                echo DB_EXEC_EDIT_FAIL;
            }
        }else{
            echo DB_EXEC_EDIT_FAIL;
        }
    }
}