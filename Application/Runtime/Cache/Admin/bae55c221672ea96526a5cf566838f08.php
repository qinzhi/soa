<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>轻微OA</title>

    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/Admin/resource/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/Public/Admin/resource/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->


    <!--Beyond styles-->
    <link id="beyond-link" href="/Public/Admin/resource/css/beyond.min.css" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/soa.min.css" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/typicons.min.css" rel="stylesheet" />
    <link href="/Public/Admin/resource/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <script src="/Public/Admin/resource/js/jquery-2.0.3.min.js"></script>

    <script src="/Public/Admin/resource/js/lib.js"></script>
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/Public/Admin/resource/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
<!-- loding -->
<!-- Loading Container -->
<div class="loading-container loading-active">
    <div class="loading-progress">
        <div class="rotator">
            <div class="rotator">
                <div class="rotator colored">
                    <div class="rotator">
                        <div class="rotator colored">
                            <div class="rotator colored"></div>
                            <div class="rotator"></div>
                        </div>
                        <div class="rotator colored"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
        <div class="rotator"></div>
    </div>
</div>
<!--  /Loading Container -->
<!-- /loding -->
<!-- loding -->
<!-- Navbar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/Public/Admin/resource/img/logo.png" alt="" />
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings --->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class=" dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                <i class="icon fa fa-warning"></i>
                            </a>
                            <!--Notification Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-phone bg-themeprimary white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">下午有个重要会议</span>
                                                <span class="description">04:30 pm - 05:30 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o themeprimary"></i>
                                                <span class="description">技术部</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-check bg-darkorange white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Uncharted break</span>
                                                <span class="description">03:30 pm - 05:15 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o darkorange"></i>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-gift bg-warning white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">凯特的生日聚会</span>
                                                <span class="description">03:30 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-calendar warning"></i>
                                                <i class="fa fa-clock-o warning"></i>
                                                <span class="description">会议室</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-glass bg-success white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">下班一起聚会</span>
                                                <span class="description">06:00 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o warning"></i>
                                                <span class="description">桃源酒店</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer ">
                                        <span>
                                            今天, <?php echo date('m月d号');?>
                                        </span>
                                        <span class="pull-right">
                                            <?php echo ($weather->data->temp); ?>
                                            <i class="wi wi-day-sunny-overcast"></i>
                                        </span>
                                </li>
                            </ul>
                            <!--/Notification Dropdown-->
                        </li>
                        <li>
                            <a class="wave in dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                <i class="icon fa fa-envelope"></i>
                                <span class="badge">3</span>
                            </a>
                            <!--Messages Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                                <li>
                                    <a href="#">
                                        <img src="/Public/Admin/resource/img/avatars/divyia.jpg" class="message-avatar" alt="Divyia Austin">
                                        <div class="message">
                                                <span class="message-sender">
                                                    Divyia Austin
                                                </span>
                                                <span class="message-time">
                                                    2 minutes ago
                                                </span>
                                                <span class="message-subject">
                                                    Here's the recipe for apple pie
                                                </span>
                                                <span class="message-body">
                                                    to identify the sending application when the senders image is shown for the main icon
                                                </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/Public/Admin/resource/img/avatars/bing.png" class="message-avatar" alt="Microsoft Bing">
                                        <div class="message">
                                                <span class="message-sender">
                                                    Bing.com
                                                </span>
                                                <span class="message-time">
                                                    Yesterday
                                                </span>
                                                <span class="message-subject">
                                                    Bing Newsletter: The January Issue‏
                                                </span>
                                                <span class="message-body">
                                                    Discover new music just in time for the Grammy® Awards.
                                                </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/Public/Admin/resource/img/avatars/adam-jansen.jpg" class="message-avatar" alt="Divyia Austin">
                                        <div class="message">
                                                <span class="message-sender">
                                                    Nicolas
                                                </span>
                                                <span class="message-time">
                                                    Friday, September 22
                                                </span>
                                                <span class="message-subject">
                                                    New 4K Cameras
                                                </span>
                                                <span class="message-body">
                                                    The 4K revolution has come over the horizon and is reaching the general populous
                                                </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!--/Messages Dropdown-->
                        </li>

                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                                <i class="icon fa fa-tasks"></i>
                                <span class="badge">4</span>
                            </a>
                            <!--Tasks Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-tasks dropdown-arrow ">
                                <li class="dropdown-header bordered-darkorange">
                                    <i class="fa fa-tasks"></i>
                                    4 Tasks In Progress
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Account Creation</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:65%" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Profile Data</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:35%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Updating Resume</span>
                                            <span class="pull-right">75%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:75%" class="progress-bar progress-bar-darkorange"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Adding Contacts</span>
                                            <span class="pull-right">10%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:10%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>

                                <li class="dropdown-footer">
                                    <a href="#">
                                        See All Tasks
                                    </a>
                                    <button class="btn btn-xs btn-default shiny darkorange icon-only pull-right"><i class="fa fa-check"></i></button>
                                </li>
                            </ul>
                            <!--/Tasks Dropdown-->
                        </li>
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/Public/Admin/resource/img/avatars/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>大智&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>大智</a></li>
                                <li class="email"><a>631248045@live.com</a></li>
                                <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <img src="/Public/Admin/resource/img/avatars/adam-jansen.jpg" class="avatar">
                                        <span class="caption">设置头像</span>
                                    </div>
                                </li>
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="profile.html" class="pull-left">个人中心</a>
                                    <a href="#" class="pull-right">设置</a>
                                </li>
                                <!--Theme Selector Area-->
                                <li class="theme-area">
                                    <ul class="colorpicker" id="skin-changer">
                                        <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/Public/Admin/resource/css/skins/blue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/Public/Admin/resource/css/skins/azure.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/Public/Admin/resource/css/skins/teal.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/Public/Admin/resource/css/skins/green.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/Public/Admin/resource/css/skins/orange.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/Public/Admin/resource/css/skins/pink.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/Public/Admin/resource/css/skins/darkred.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/Public/Admin/resource/css/skins/purple.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/Public/Admin/resource/css/skins/darkblue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/Public/Admin/resource/css/skins/gray.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/Public/Admin/resource/css/skins/black.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/Public/Admin/resource/css/skins/deepblue.min.css"></a></li>
                                    </ul>
                                </li>
                                <!--/Theme Selector Area-->
                                <li class="dropdown-footer">
                                    <a href="login.html">
                                        退出
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                        no space must be between these elements-->
                        <!-- Settings -->
                    </ul><div class="setting">
                        <a id="btn-setting" title="Setting" href="#">
                            <i class="icon glyphicon glyphicon-cog"></i>
                        </a>
                    </div><div class="setting-container">
                        <label>
                            <input type="checkbox" id="checkbox_fixednavbar">
                            <span class="text">固定头部</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedsidebar">
                            <span class="text">固定侧栏</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                            <span class="text">固定面包屑</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedheader">
                            <span class="text">固定头</span>
                        </label>
                    </div>
                    <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<!-- /Navbar -->
<!-- /loding -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <input type="text" class="searchinput" />
                <i class="searchicon fa fa-search"></i>
                <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
            </div>
            <!-- /Page Sidebar Header -->

            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
    <!--首页-->
    <li>
        <a href="index.html">
            <i class="menu-icon glyphicon glyphicon-home"></i>
            <span class="menu-text"> 首页 </span>
        </a>
    </li>

    <!--UI Elements-->
    <li class="open active">
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text"> 系统设置 </span>

            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li class="open active">
                <a href="#" class="menu-dropdown">
                    <span class="menu-text"> 通讯录 </span>
                    <i class="menu-expand"></i>
                </a>
                <ul class="submenu">
                    <li class="active">
                        <a href="/addressbook/organ">
                            <span class="menu-text">组织图</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addressbook/position">
                            <span class="menu-text">职位</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addressbook/rank">
                            <span class="menu-text">部门级别</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addressbook/member">
                            <span class="menu-text">员工登记</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/app">
                    <span class="menu-text"> 应用中心 </span>
                </a>
            </li>
        </ul>
    </li>

</ul>

            <!-- /Sidebar Menu -->
        </div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">

            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">首页</a>
        </li>
        <li>
            <a href="#">通讯录</a>
        </li>
        <li class="active">组织图</li>
    </ul>
</div>
            <!-- /Page Breadcrumb -->

            <!-- Page Header -->
            <div class="page-header position-relative">
                <div class="header-title">
                    <h1>
                        组织图
                    </h1>
                </div>
                <!--Header Buttons-->
                <div class="header-buttons">
                    <a class="sidebar-toggler" href="#">
                        <i class="fa fa-arrows-h"></i>
                    </a>
                    <a class="refresh" id="refresh-toggler" href="">
                        <i class="glyphicon glyphicon-refresh"></i>
                    </a>
                    <a class="fullscreen" id="fullscreen-toggler" href="#">
                        <i class="glyphicon glyphicon-fullscreen"></i>
                    </a>
                </div>
                <!--Header Buttons End-->
            </div>
            <!-- /Page Header -->
            <!-- Page Body -->
            <div class="page-body">
                <!-- Your Content Goes Here -->
                
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="widget-caption">
                    <form class="form-inline" role="form" autocomplete="off">
                        <div class="form-group">
                            <label for="exampleInputEmail2">&nbsp;部门:&nbsp;</label>
                            <select class="input-sm">
                                <?php $show_dept = function($depts,$count) use (&$show_dept){ if(!empty($depts) && is_array($depts)): $black = ''; if($count > 1){ for($j=1;$j<$count;$j++){ $black .= '&nbsp;&nbsp;&nbsp;&nbsp;'; } } for($i=0,$len=count($depts);$i<$len;$i++): echo '<option value="' . $depts[$i]['id'] . '">' . $black . $depts[$i]['name'] . '</option>'; if(!empty($depts[$i]['child'])): $step = $count + 1; $show_dept($depts[$i]['child'],$step); endif; endfor; endif; };?>
                                <?php $show_dept($depts,1);?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-top: -4px;">
                            <a class="btn btn-success" id="import_member" href="javascript:void(0);">批量导入</a>
                        </div>
                        <div class="form-group" style="margin-top: -4px;">
                            <a class="btn btn-success" id="import_member" href="javascript:void(0);">设置密码</a>
                        </div>
                    </form>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" id="add_member" href="javascript:void(0);">添加</a>
                    <a class="btn btn-success" id="update_member" href="javascript:void(0);">保存</a>
                    <span> | </span>
                    <a class="btn btn-danger" id="del_member" href="javascript:void(0);">删除</a>
                </div>
                <div class="clearfix"></div>
            </div><!--Widget Header-->
            <div class="widget-body plugins_member-">
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <div class="well">
                            <table class="table table-bordered table-condensed table-hover table-focus">
                                <thead>
                                <tr>
                                    <th width="25%">
                                        <div class="checkbox">
                                            <label>
                                                <input class="colored-blue" type="checkbox" autocomplete="off"><span class="text" style="font-weight: bold">编号</span>
                                            </label>
                                        </div>
                                    </th>
                                    <th width="50%">
                                        姓名
                                    </th>
                                    <th width="25%">
                                        状态
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($members)): $i = 0; $__LIST__ = $members;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-node="<?php echo ($vo["id"]); ?>">
                                            <th>
                                                <div class="checkbox">
                                                    <label>
                                                        <input class="colored-blue" type="checkbox" value="<?php echo ($vo["id"]); ?>"><span class="text"><?php echo ($vo["id"]); ?></span>
                                                    </label>
                                                </div>
                                            </th>
                                            <td><?php echo ($vo["name"]); ?></td>
                                            <td><?php echo ($vo['status'] == 1?'启用':'禁用'); ?></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="well">
                            <form class="bv-form form-member" autocomplete="off">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th> 账号*  </th>
                                            <td colspan="2"> <input class="form-control" type="text" msg="请输入账号" check="require" name="account"> </td>
                                            <td class="col-20" rowspan="3" style="text-align: center; vertical-align: middle;">
                                                <input type="hidden" name="avatar" id="avatar"/>
                                                <div class="avatar-area">
                                                    <img class="avatar" src="/Public/Admin/resource/img/avatars/adam-jansen.jpg">
                                                    <span class="caption">上传图片</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> 姓名*  </th>
                                            <td colspan="2"> <input id="name" class="form-control" type="text" msg="请输入姓名" check="require" name="name"> </td>
                                        </tr>
                                        <tr>
                                            <th> 部门*  </th>
                                            <td colspan="2">
                                                <div class="input-group">
                                                    <input name="dept_name" type="text" class="form-control" disabled>
                                                    <input name="dept_id" type="hidden" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-success select-dept">选择</button>
                                                    </span>
                                                    <div class="dept-root well with-header">
                                                        <div class="header bordered-sky" style="position: absolute;top: 0;">请选择部门</div>
                                                        <?php $show_dept = function($depts,$count) use (&$show_dept){ if(!empty($depts) && is_array($depts)): for($i=0,$len=count($depts);$i<$len;$i++): if($i==0): echo '<ul class="tree_menu">'; endif; echo '<li>
                                                                        <a data-node="'.$depts[$i]['id'].'">
                                                                            <i class="fa fa-angle-right level' . $count . '"></i>
                                                                            <span>'.$depts[$i]['name'].'</span>
                                                                        </a>'; if(!empty($depts[$i]['child'])): $step = $count + 1; $show_dept($depts[$i]['child'],$step); endif; echo '</li>'; if($i==$len-1): echo '</ul>'; endif; endfor; endif; };$show_dept($depts,1);?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%"> 性别 </th>
                                            <td width="30%">
                                                <select name="sex" class="form-control">
                                                    <option value="1">男</option>
                                                    <option value="2">女</option>
                                                </select>
                                            </td>
                                            <th width="20%"> 生日 </th>
                                            <td>
                                                <input name="birthday" class="form-control date-picker" type="text" data-date-format="yyyy-mm-dd" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> 职位* </th>
                                            <td>
                                                <input type="hidden" name="position_id"/>
                                                <select name="position" class="form-control">
                                                    <option value="">选择职位</option>
                                                    <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>" data-node="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </td>

                                            <th> QQ号 </th>
                                            <td>
                                                <input name="qq" class="form-control" type="text" msg="请输入QQ号">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> 住址 </th>
                                            <td>
                                                <input name="site" class="form-control" type="text">
                                            </td>
                                            <th> 微信号* </th>
                                            <td>
                                                <input name="weixinid" class="form-control" type="text" msg="请输入微信号">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 15%"> 移动电话* </th>
                                            <td style="width: 35%">
                                                <input name="mobile_tel" class="form-control" type="text" msg="请输入移动电话">
                                            </td>
                                            <th style="width: 15%"> 办公电话  </th>
                                            <td style="width: 35%">
                                                <input name="office_tel" class="form-control" type="text" msg="请输入办公电话">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> 电子邮箱* </th>
                                            <td colspan="3">
                                                <input name="email" class="form-control" type="text" msg="请输入电子邮箱">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> 负责业务* </th>
                                            <td colspan="3">
                                                <input name="duty" class="form-control" type="text" msg="请输入负责业务">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>状态* </th>
                                            <td colspan="3">
                                                <select name="status">
                                                    <option value="1">启用</option>
                                                    <option value="0">禁用</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="alert alert-warning fade in">
                            <button class="close" data-dismiss="alert"> × </button>
                            <i class="fa-fw fa fa-warning"></i>
                            <strong>注：</strong>
                            带*为必填选项
                        </div>

                    </div>
                </div>
            </div><!--Widget Body-->
        </div><!--Widget-->
    </div>
</div>

<div id="addModal" style="display:none;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal bv-form form-member" method="post"></form>
        </div>
    </div>
</div>
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Container -->
</div>
<!-- Main Container -->

<!--Basic Scripts-->
<script src="/Public/Admin/resource/js/bootstrap.min.js"></script>
<script src="/Public/Admin/resource/js/datetime/bootstrap-datepicker.js"></script>
<script src="/Public/Admin/resource/js/bootbox/bootbox.js"></script>
<script src="/Public/Admin/resource/js/toastr/toastr.js"></script>
<script src="/Public/Admin/CKeditor/ckeditor.js"></script>
<script src="/Public/Admin/CKfinder/ckfinder.js"></script>
<!--Beyond Scripts-->
<script src="/Public/Admin/resource/js/beyond.min.js"></script>

<?php
 $src = array_shift(C('TMPL_PARSE_STRING')) . '/JS' . $_SERVER["REQUEST_URI"]; if(is_file(PROJECT_PATH . $src . '.js')){ echo '<script src="' . $src . '.js"></script>'; } ?>

</body>
<!--  /Body -->
</html>