<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px">
                <a class="btn btn-success" id="add_map" href="javascript:void(0);">添加</a>
                <a class="btn btn-success" id="update_map" href="javascript:void(0);">保存</a>
                <span> | </span>
                <a class="btn btn-danger" id="del_map" href="javascript:void(0);">删除</a>
            </div><!--Widget Header-->
            <div class="widget-body plugins_map-">
                <div class="row">
                    <div class="col-xs-6 col-md-4 tissue_tree">
                        <div class="well">
                            <?php $show_map = function($maps,$count) use (&$show_map){
                                if(!empty($maps) && is_array($maps)):
                                    $count++;
                                    for($i=0,$len=count($maps);$i<$len;$i++):
                                        if($i==0):
                                            echo '<ul class="tree_menu">';
                                        endif;
                                        echo '<li>
                                            <a data-node="'.$maps[$i]['id'].'">
                                                <i class="fa fa-angle-right level' . $count . '"></i>
                                                <span>'.$maps[$i]['name'].'</span>
                                            </a>';
                                        if(!empty($maps[$i]['child'])):
                                            $show_map($maps[$i]['child'],$count);
                                        endif;
                                        echo '</li>';
                                        if($i==$len-1):
                                            echo '</ul>';
                                        endif;
                                    endfor;

                                endif;
                            };$show_map($maps,0);?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="well">
                            <input id="id" type="hidden"/>
                            <form class="form-horizontal bv-form form-map">
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">名称*：</label>
                                    <div class="col-lg-8">
                                        <input name="name" value="" class="form-control" type="text" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">地址*：</label>
                                    <div class="col-lg-8">
                                        <input name="site" class="form-control" type="text" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">图标：</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="icon" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default shiny" type="button">&nbsp;</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">父节点*：</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input name="p_name" type="text" class="form-control" autocomplete="off" disabled>
                                            <input name="p_id" type="hidden" class="form-control" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success select-map">选择</button>
                                            </span>
                                            <div class="map-root well with-header">
                                                <div class="header bordered-sky" style="position: absolute;top: 0;">请选择上级节点</div>
                                                <ul class="tree_menu"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">排序：</label>
                                    <div class="col-lg-8">
                                        <input name="sort" class="form-control" type="text" autocomplete="off">
                                    </div>
                                </div>
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
                            最多添加三级
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
            <form class="form-horizontal bv-form form-map" method="post"></form>
        </div>
    </div>
</div>