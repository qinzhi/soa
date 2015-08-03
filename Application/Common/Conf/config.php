<?php
return array(

    "LOAD_EXT_FILE"=>"fb",

    'LOAD_EXT_CONFIG'	=>'db,db_status,wechat,tags',

    'TMPL_TEMPLATE_SUFFIX'=>'.php', //模板文件的后缀

    'DEFAULT_AJAX_RETURN' => 'JSON',
    'DEFAULT_V_LAYER'       =>  'Tpl',

    'APP_GROUP_LIST'=>'Home,Admin', //开启分组
    'DEFAULT_MODULE' => 'Home',     //默认模块

    //'SHOW_PAGE_TRACE' =>true,

    //子域名部署
    //'URL_CASE_INSENSITIVE'  =>  true,   //URL大小写
    'APP_SUB_DOMAIN_DEPLOY'   =>    1,   // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>    array(
        'admin.soa.com'  => 'Admin',      // admin.soa.com域名指向Admin模块
       // 'localhost'  => 'Home',
        'www.soa.com'  => 'Home',      // www.domain1.com域名指向Home模块
    ),
);