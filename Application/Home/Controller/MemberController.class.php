<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {

    function __construct(){
        parent::__construct();
        $this->member = D('Member');
    }

    public function index(){
        $members = $this->member->get_members('id,name,letter,position_str,office_tel,mobile_tel');
        $members = $this->member->format_members($members);
//fb($members);
        $this->assign('members',$members);
        $this->display();
    }
}