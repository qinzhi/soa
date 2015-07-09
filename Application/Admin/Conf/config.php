<?php

return array(

    'SHOW_ERROR_MSG'        =>  true,

    'DEFAULT_V_LAYER'       =>  'Tpl',

    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => '/Public/Admin', // 更改默认的/Public 替换规则
        '__CKEDITOR__' => '/Public/Admin/CKeditor', // 富文本编辑器
        '__CKFINDER__' => '/Public/Admin/CKfinder', // 图片资源管理器
        '__JS__'     => '/Public/Admin/resource/js', // 增加新的JS类库路径替换规则
        '__CSS__' => '/Public/Admin/resource/css', // 增加新的CSS类库路径替换规则
        '__IMAGE__' => '/Public/Admin/resource/img', // 增加新的img类库路径替换规则
    ),

    'WEIXIN' => array(
        'CorpID'    =>  'wxd6b85e3d79152555'
        ,'Secret'   =>  'x-8vB7TMz2kUhsiRZeb53U9Rn8trIR6gYNqjjc7fTu0ZJr_0a4pNScvUgnH5GOn8'
    ),

    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'login' => 'public/login',
        'news/:id'               => 'News/read',
        'news/read/:id'          => '/news/:1',
    ),
    //模板布局
    //'LAYOUT_ON'=>true,
    //'LAYOUT_NAME'=>'layout',
    //'TMPL_LAYOUT_ITEM'      =>  '{__REPLACE__}',
    //'LAYOUT_NAME'=>'Layout/col',
);