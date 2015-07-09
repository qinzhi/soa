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
    <link href="/Public/Admin/resource/css/dataTables.bootstrap.css" rel="stylesheet" />
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
                <div class="searchhelper">关键字搜索</div>
            </div>
            <!-- /Page Sidebar Header -->

            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
    <?php $show_slide = function($slideBar,$breadcrumbs,$count) use (&$show_slide){ if(!empty($slideBar) && is_array($slideBar)): if(!empty($breadcrumbs[$count])){ $id = $breadcrumbs[$count]['id']; } ++$count; for($i=0,$len=count($slideBar);$i<$len;$i++): if($i==0 && $count >= 2): echo '<ul class="submenu">'; endif; $active = ''; if(isset($id) && $slideBar[$i]['id'] == $id){ if($count < count($breadcrumbs)){ $active = 'class="active open"'; }else{ $active = 'class="active"'; } } $icon = ''; if(!empty($slideBar[$i]['icon'])){ $icon = '<i class="menu-icon fa ' . $slideBar[$i]['icon'] . ' level' . $count . '"></i>'; } $site = 'javascript:;'; if(!empty($slideBar[$i]['site'])){ $site = '/' . trim($slideBar[$i]['site'] , '/'); } if(!empty($slideBar[$i]['child'])): echo '<li ' . $active . '>
                        <a href="' . $site . '" class="menu-dropdown" data-node="'.$slideBar[$i]['id'].'">
                            ' . $icon . '
                            <span class="menu-text">'.$slideBar[$i]['name'].'</span>
                            <i class="menu-expand"></i></a>'; $show_slide($slideBar[$i]['child'],$breadcrumbs,$count); echo '</li>'; else: echo '<li ' . $active . '>
                        <a href="' . $site . '" data-node="'.$slideBar[$i]['id'].'">
                            ' . $icon . '
                            <span class="menu-text">'.$slideBar[$i]['name'].'</span>
                            </a></li>'; endif; if($i==$len-1 && $count >= 2): echo '</ul>'; endif; endfor; endif; };$show_slide($slideBar,$breadcrumbs,0);?>
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
        <?php for($i=0,$len=count($breadcrumbs);$i<$len;$i++){ if($i<$len-1){ echo '<li><a href="#">' . $breadcrumbs[$i]['name'] . '</a></li>'; }else{ echo '<li class="active">' . $breadcrumbs[$i]['name'] . '</li>'; } }?>
    </ul>
</div>
            <!-- /Page Breadcrumb -->

            <!-- Page Header -->
            <div class="page-header position-relative">
                <div class="header-title">
                    <h1>
                        <?php if(!empty($breadcrumbs)){echo $breadcrumbs[count($breadcrumbs)-1]['name'];}else{echo '首页';}?>
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
            <div class="widget-body plugins_dept-">
                <div class="row">
                    <div class="col-xs-6 col-md-4 tissue_tree">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">选择部门</span>
                            </div>
                            <div class="widget-body">
                                <?php $show_dept = function($depts,$count) use (&$show_dept){ if(!empty($depts) && is_array($depts)): ++$count; for($i=0,$len=count($depts);$i<$len;$i++): if($i==0): echo '<ul class="tree_menu">'; endif; $active = '';$href = 'href="/member?cid=' . $depts[$i]['id'] . '"'; if(($count==1 && $i== 0 && empty($_GET['cid'])) || (!empty($_GET['cid']) && $_GET['cid'] == $depts[$i]['id'])){ $active = 'class="active"'; $href = 'javascript:;'; } echo '<li>
                                                    <a ' . $active . ' data-node="'.$depts[$i]['id'].'"' . $href . '>
                                                        <i class="fa fa-angle-right level' . $count . '"></i>
                                                        <span>'.$depts[$i]['name'].'</span>
                                                    </a>'; if(!empty($depts[$i]['child'])): $show_dept($depts[$i]['child'],$count); endif; echo '</li>'; if($i==$len-1): echo '</ul>'; endif; endfor; endif; };$show_dept($depts,0);?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">职员表</span>
                                <div class="widget-buttons">
                                    <a data-toggle="maximize" href="#">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                    <a data-toggle="collapse" href="#">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <a data-toggle="dispose" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div role="grid" id="expandabledatatable_wrapper" class="dataTables_wrapper form-inline no-footer">
                                    <div class="DTTT btn-group">
                                        <button class="btn btn-default" type="button"> 打印 </button>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                                                <i class="fa fa-ellipsis-horizontal"></i> 导出 <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#">CSV</a>
                                                </li>
                                                <li>
                                                    <a href="#">Excel</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="expandabledatatable_filter" class="dataTables_filter">
                                        <label><input type="search" class="form-control input-sm" aria-controls="expandabledatatable"></label>
                                    </div>
                                    <div class="dataTables_length" id="expandabledatatable_length">
                                        <label>
                                            <select name="expandabledatatable_length" aria-controls="expandabledatatable" class="form-control input-sm">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                            </select>
                                        </label>
                                    </div>
                                    <table id="expandabledatatable" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="expandabledatatable_info">
                                        <thead>
                                        <tr role="row">
                                            <th width="5%"></th>
                                            <th width="15%">账号</th>
                                            <th width="15%">姓名</th>
                                            <th width="15%">部门</th>
                                            <th width="15%">职位</th>
                                            <th width="15%">手机号</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($members)): $k = 0; $__LIST__ = $members;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="<?php echo ($k/2 ? 'odd' : 'even'); ?>">
                                                    <td><i class="fa fa-plus-square-o row-details" data-node="1"></i></td>
                                                    <td>
                                                        <?php echo ($vo["account"]); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($vo["name"]); ?>
                                                    </td>
                                                    <td>
                                                        <?php
 $get_dept = function($depts,$dept_id,$flag) use (&$get_dept){ if($flag){ foreach($depts as $dept){ if($dept_id == $dept['id']){ echo $dept['name']; return; }elseif(!empty($dept['child'])){ $get_dept($dept['child'],$dept_id,true); } } } };$get_dept($depts,$vo['dept_id'],true); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($vo["position_str"]); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($vo["mobile_tel"]); ?>
                                                    </td>
                                                </tr>
                                                <tr data-node="1" style="display: none;">
                                                    <td class="details" colspan="6">
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td style="padding:0 10px 0 0;" rowspan="5" class="details"><img src="/Public/Admin/resource/img/avatars/adam-jansen.jpg"></td>
                                                                <td class="details details-key">姓名:</td>
                                                                <td class="details"><?php echo ($vo["name"]); ?></td>
                                                                <td class="details details-key">职位:</td>
                                                                <td class="details"><?php echo ($vo["position_str"]); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">性别:</td>
                                                                <td class="details"><?php echo (get_sex($vo["sex"])); ?></td>
                                                                <td class="details details-key">生日:</td>
                                                                <td class="details"><?php echo ($vo["birthday"]); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">微信号:</td>
                                                                <td class="details"><?php echo ($vo["weixinid"]); ?></td>
                                                                <td class="details details-key">QQ号:</td>
                                                                <td class="details"><?php echo ($vo["qq"]); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">移动电话:</td>
                                                                <td class="details"><?php echo ($vo["mobile_tel"]); ?></td>
                                                                <td class="details details-key">办公电话:</td>
                                                                <td class="details"><?php echo ($vo["office_tel"]); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">电子邮箱:</td>
                                                                <td class="details"><?php echo ($vo["email"]); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="details details-key">负责业务:</td>
                                                                <td class="details"><?php echo ($vo["duty"]); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="details details-key">居住地址:</td>
                                                                <td class="details"><?php echo ($vo["site"]); ?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="row DTTTFooter">
                                        <div class="col-sm-6">
                                            <div class="dataTables_info" id="expandabledatatable_info">
                                                总共:  <span style="margin-left: 5px;"><?php echo ($total); ?></span>人
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="dataTables_paginate paging_bootstrap" id="expandabledatatable_paginate">
                                                <?php page('/member',$page_num,$page);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Widget Body-->
        </div><!--Widget-->
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
 $script = explode('/',trim($_SERVER['PATH_INFO'],'/')); if(count($script) === 1){ array_push($script,'index'); } $src = array_shift(C('TMPL_PARSE_STRING')) . '/JS' . '/' . implode('/',$script); if(is_file(PROJECT_PATH . $src . '.js')){ echo '<script src="' . $src . '.js"></script>'; } ?>

</body>
<!--  /Body -->
</html>