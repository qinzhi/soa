<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px">
                <a class="btn btn-success" id="add_dept" href="javascript:void(0);">添加</a>
                <a class="btn btn-success" id="update_dept" href="javascript:void(0);">保存</a>
                <span> | </span>
                <a class="btn btn-danger" id="del_dept" href="javascript:void(0);">删除</a>
            </div><!--Widget Header-->
            <div class="widget-body plugins_dept-">
                <div class="row">
                    <div class="col-xs-6 col-md-4 tissue_tree">
                        <div class="well">
                            <?php $show_dept = function($depts,$count) use (&$show_dept){
                                if(!empty($depts) && is_array($depts)):
                                    for($i=0,$len=count($depts);$i<$len;$i++):
                                        if($i==0):
                                            echo '<ul class="tree_menu">';
                                        endif;
                                        echo '<li>
                                            <a data-node="'.$depts[$i]['id'].'">
                                                <i class="fa fa-angle-right level' . $count . '"></i>
                                                <span>'.$depts[$i]['name'].'</span>
                                            </a>';
                                        $count++;
                                        if(!empty($depts[$i]['child'])):
                                            $show_dept($depts[$i]['child'],$count);
                                        endif;
                                        echo '</li>';
                                        if($i==$len-1):
                                            echo '</ul>';
                                        endif;
                                    endfor;
                                endif;
                            };$show_dept($depts,1);?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="well">
                            <input id="id" type="hidden"/>
                            <form class="form-horizontal bv-form form-dept">
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">名称*：</label>
                                    <div class="col-lg-8">
                                        <input name="name" value="" class="form-control" type="text" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">简称*：</label>
                                    <div class="col-lg-8">
                                        <input name="short_name" class="form-control" type="text" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">上级部门*：</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input name="p_name" type="text" class="form-control" autocomplete="off" disabled>
                                            <input name="p_id" type="hidden" class="form-control" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success select-dept">选择</button>
                                            </span>
                                            <div class="dept-root well with-header">
                                                <div class="header bordered-sky" style="position: absolute;top: 0;">请选择上级部门</div>
                                                <ul class="tree_menu">
                                                    <!--<li>
                                                        <a data-node="0"><i class="fa fa-angle-right level1"></i><span>根节点</span></a>
                                                    </li>-->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">部门级别*：</label>
                                    <div class="col-lg-8">
                                        <select name="grade_id" class="form-control" autocomplete="off">
                                            <option value="">选择部门级别</option>
                                            <volist name="rank" id="vo">
                                                <option value="{$vo.id}">{$vo.name}</option>
                                            </volist>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">排序：</label>
                                    <div class="col-lg-8">
                                        <input name="sort" class="form-control" type="text" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">其他：</label>
                                    <div class="col-lg-8">
                                        <span class="input-icon icon-right">
                                            <textarea name="remark" class="form-control"  rows="5" autocomplete="off"></textarea>
                                            <i class="fa  fa-rocket darkorange"></i>
                                        </span>
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
                            没有子部门且没有成员的部门才可以被删除。
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
            <form class="form-horizontal bv-form form-dept" method="post"></form>
        </div>
    </div>
</div>