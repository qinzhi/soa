<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {

    function __construct(){
        parent::__construct();
        $this->member = D('Member');
        $this->admin_dept = D('Admin/Dept');
    }

    public function index(){
        $members = $this->member->get_members('id,name,letter,position_str,office_tel,mobile_tel');
        $members = $this->member->format_members($members);
//fb($members);
        $depts = $this->admin_dept->get_depts();
        $this->assign('depts',!empty(current($depts)['child']) ? current($depts)['child'] : array());
        $this->assign('members',$members);
        $this->display();
    }
}