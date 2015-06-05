<?php

return array(

    'SHOW_ERROR_MSG'        =>  true,

    'DEFAULT_V_LAYER'       =>  'Tpl',

    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => '/Public/Admin', // 更改默认的/Public 替换规则
        '__JS__'     => '/Public/Admin/js', // 增加新的JS类库路径替换规则
        '__CSS__' => '/Public/Admin/css', // 增加新的CSS类库路径替换规则
        '__IMAGE__' => '/Public/Admin/img', // 增加新的img类库路径替换规则
    ),

    'WEIXIN' => array(
        'CorpID'    =>  'wx755896948c0fb82d'
        ,'Secret'   =>  '_coTBTWxo6RiJ04UE3pMnUvmLzeBpSJlVo9ffzK3K092X-8REVUnFFJcf8zQkn40'
    ),
    //模板布局
    //'LAYOUT_ON'=>true,
    //'LAYOUT_NAME'=>'layout',
    //'TMPL_LAYOUT_ITEM'      =>  '{__REPLACE__}',
    //'LAYOUT_NAME'=>'Layout/col',
);