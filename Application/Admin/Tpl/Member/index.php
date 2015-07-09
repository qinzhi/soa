<layout name="Layout/col" />
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
                                <?php $show_dept = function($depts,$count) use (&$show_dept){
                                    if(!empty($depts) && is_array($depts)):
                                        ++$count;
                                        for($i=0,$len=count($depts);$i<$len;$i++):
                                            if($i==0):
                                                echo '<ul class="tree_menu">';
                                            endif;
                                            $active = '';$href = 'href="/member?cid=' . $depts[$i]['id'] . '"';
                                            if(($count==1 && $i== 0 && empty($_GET['cid'])) || (!empty($_GET['cid']) && $_GET['cid'] == $depts[$i]['id'])){
                                                $active = 'class="active"';
                                                $href = 'javascript:;';
                                            }
                                            echo '<li>
                                                    <a ' . $active . ' data-node="'.$depts[$i]['id'].'"' . $href . '>
                                                        <i class="fa fa-angle-right level' . $count . '"></i>
                                                        <span>'.$depts[$i]['name'].'</span>
                                                    </a>';
                                            if(!empty($depts[$i]['child'])):
                                                $show_dept($depts[$i]['child'],$count);
                                            endif;
                                            echo '</li>';
                                            if($i==$len-1):
                                                echo '</ul>';
                                            endif;
                                        endfor;
                                    endif;
                                };$show_dept($depts,0);?>
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
                                            <volist name="members" id="vo" key="k">
                                                <tr class="{$k/2 ? 'odd' : 'even'}">
                                                    <td><i class="fa fa-plus-square-o row-details" data-node="1"></i></td>
                                                    <td>
                                                        {$vo.account}
                                                    </td>
                                                    <td>
                                                        {$vo.name}
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $get_dept = function($depts,$dept_id,$flag) use (&$get_dept){
                                                                if($flag){
                                                                    foreach($depts as $dept){
                                                                        if($dept_id == $dept['id']){
                                                                            echo $dept['name'];
                                                                            return;
                                                                        }elseif(!empty($dept['child'])){
                                                                            $get_dept($dept['child'],$dept_id,true);
                                                                        }
                                                                    }
                                                                }
                                                            };$get_dept($depts,$vo['dept_id'],true);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        {$vo.position_str}
                                                    </td>
                                                    <td>
                                                        {$vo.mobile_tel}
                                                    </td>
                                                </tr>
                                                <tr data-node="1" style="display: none;">
                                                    <td class="details" colspan="6">
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td style="padding:0 10px 0 0;" rowspan="5" class="details"><img src="__IMAGE__/avatars/adam-jansen.jpg"></td>
                                                                <td class="details details-key">姓名:</td>
                                                                <td class="details">{$vo.name}</td>
                                                                <td class="details details-key">职位:</td>
                                                                <td class="details">{$vo.position_str}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">性别:</td>
                                                                <td class="details">{$vo.sex|get_sex}</td>
                                                                <td class="details details-key">生日:</td>
                                                                <td class="details">{$vo.birthday}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">微信号:</td>
                                                                <td class="details">{$vo.weixinid}</td>
                                                                <td class="details details-key">QQ号:</td>
                                                                <td class="details">{$vo.qq}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">移动电话:</td>
                                                                <td class="details">{$vo.mobile_tel}</td>
                                                                <td class="details details-key">办公电话:</td>
                                                                <td class="details">{$vo.office_tel}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="details details-key">电子邮箱:</td>
                                                                <td class="details">{$vo.email}</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="details details-key">负责业务:</td>
                                                                <td class="details">{$vo.duty}</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="details details-key">居住地址:</td>
                                                                <td class="details">{$vo.site}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </volist>
                                        </tbody>
                                    </table>
                                    <div class="row DTTTFooter">
                                        <div class="col-sm-6">
                                            <div class="dataTables_info" id="expandabledatatable_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 5 of 6 entries</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="dataTables_paginate paging_bootstrap" id="expandabledatatable_paginate">
                                                <ul class="pagination">
                                                    <li class="prev disabled"><a href="#">Prev</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li class="next"><a href="#">Next</a></li>
                                                </ul>
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