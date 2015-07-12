<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>轻微OA</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="/Public/Home/resource/css/jq-mobile/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <script src="/Public/Home/resource/js/jquery.min.js"></script>
    <script src="/Public/Home/resource/js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>


<div data-role="page" >
    <div data-role="header">
        <h1>企业通讯录</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">架构</a>
    </div><!-- /header -->

    <div role="main" class="ui-content">
        <ul data-role="listview" data-filter="true"
            data-icon="false" data-filter-placeholder="搜索79位联系人" data-inset="true">
            <?php foreach($members as $key=>$value):?>
                <li data-role="list-divider"><?php echo ($key); ?></li>
                <?php foreach($value as $member):?>
                    <li><a href="index.html"><?php echo ($member["name"]); ?></a></li>
                <?php endforeach;?>
            <?php endforeach;?>
        </ul>
    </div><!-- /content -->

    <div data-role="panel" data-display="push" id="nav-panel">

        <ul data-role="listview">
            <li data-icon="delete"><a href="#" data-rel="close">Close menu</a></li>
            <li><a href="#panel-responsive-page2">Accordion</a></li>
        </ul>

    </div><!-- /panel -->
</div>



</body>
<!--  /Body -->
</html>