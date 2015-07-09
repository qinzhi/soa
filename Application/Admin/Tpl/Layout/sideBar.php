<ul class="nav sidebar-menu">
    <?php $show_slide = function($slideBar,$breadcrumbs,$count) use (&$show_slide){
        if(!empty($slideBar) && is_array($slideBar)):
            if(!empty($breadcrumbs[$count])){
                $id = $breadcrumbs[$count]['id'];
            }
            ++$count;
            for($i=0,$len=count($slideBar);$i<$len;$i++):
                if($i==0 && $count >= 2):
                    echo '<ul class="submenu">';
                endif;
                $active = '';
                if(isset($id) && $slideBar[$i]['id'] == $id){
                    if($count < count($breadcrumbs)){
                        $active = 'class="active open"';
                    }else{
                        $active = 'class="active"';
                    }
                }
                $icon = '';
                if(!empty($slideBar[$i]['icon'])){
                    $icon = '<i class="menu-icon fa ' . $slideBar[$i]['icon'] . ' level' . $count . '"></i>';
                }
                $site = 'javascript:;';
                if(!empty($slideBar[$i]['site'])){
                    $site = '/' . trim($slideBar[$i]['site'] , '/');
                }
                if(!empty($slideBar[$i]['child'])):
                    echo '<li ' . $active . '>
                        <a href="' . $site . '" class="menu-dropdown" data-node="'.$slideBar[$i]['id'].'">
                            ' . $icon . '
                            <span class="menu-text">'.$slideBar[$i]['name'].'</span>
                            <i class="menu-expand"></i></a>';
                    $show_slide($slideBar[$i]['child'],$breadcrumbs,$count);
                    echo '</li>';
                else:
                    echo '<li ' . $active . '>
                        <a href="' . $site . '" data-node="'.$slideBar[$i]['id'].'">
                            ' . $icon . '
                            <span class="menu-text">'.$slideBar[$i]['name'].'</span>
                            </a></li>';
                endif;
                if($i==$len-1 && $count >= 2):
                    echo '</ul>';
                endif;
            endfor;
        endif;
    };$show_slide($slideBar,$breadcrumbs,0);?>
</ul>