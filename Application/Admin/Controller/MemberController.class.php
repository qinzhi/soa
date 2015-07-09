<?php
/**
 * 通迅录
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 9:43
 */

namespace Admin\Controller;

class MemberController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->dept =   D('Dept');
        $this->member = D('Member');
    }

    public function index(){
        $cid = (int)$_GET['cid'];
        $where = array();
        if(!empty($cid)){
            $where['dept_id'] = $cid;
        }
        $page = !empty($_POST['page']) ? (int)$_POST['page'] : 1;
        $limit = !empty($_GET['limit']) ? $_GET['limit'] : 10;
        $offset = ($page - 1) * $limit;
        $total = $this->member->get_total();
        $page_num = ceil( $total / $limit );
        $members = $this->member->get_members($offset,$limit);
        $this->assign('total',$total);
        $this->assign('page',$page);
        $this->assign('page_num',$page_num);
        $this->assign('members',$members);
        $this->assign('depts',$this->dept->get_depts());
        $this->display();
    }

}