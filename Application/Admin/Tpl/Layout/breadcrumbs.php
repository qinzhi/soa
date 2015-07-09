<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">首页</a>
        </li>
        <?php for($i=0,$len=count($breadcrumbs);$i<$len;$i++){
            if($i<$len-1){
                echo '<li><a href="#">' . $breadcrumbs[$i]['name'] . '</a></li>';
            }else{
                echo '<li class="active">' . $breadcrumbs[$i]['name'] . '</li>';
            }
        }?>
    </ul>
</div>