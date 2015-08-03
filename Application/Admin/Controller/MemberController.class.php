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
        $cid = I('get.id',1);
        $where = array();
        if(!empty($cid) && $cid != 1){
            $where['dept_id'] = array('like',"%,$cid,%");
        }
        $keyword = trim($_GET['keyword']);
        if(!empty($cid)){
            $where['name'] = array('like',"%$keyword%");
        }
        //$page = !empty($_POST['page']) ? (int)$_POST['page'] : 1;
        $page = I('post.page',1);
        //$limit = !empty($_GET['limit']) ? $_GET['limit'] : 10;
        $limit = I('get.limit',10);
        $offset = ($page - 1) * $limit;
        $total = $this->member->get_total($where);
        $page_num = ceil( $total / $limit );
        $members = $this->member->get_members($offset,$limit,$where);fb($this->member->getLastSql());
        $this->assign('total',$total);
        $this->assign('page',$page);
        $this->assign('page_num',$page_num);
        $this->assign('members',$members);
        $this->assign('depts',$this->dept->get_depts());
        $this->display();
    }
}