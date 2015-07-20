<?php
namespace Home\Controller;
use Think\Controller;
class ManifestController extends Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){
        fb('test');
    }
}