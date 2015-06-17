<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px;">
                <div class="widget-caption">
                    <form class="form-inline" role="form" autocomplete="off">
                        <div class="form-group">
                            <label for="exampleInputEmail2">&nbsp;部门:&nbsp;</label>
                            <select class="input-sm">
                                <?php $show_dept = function($depts,$count) use (&$show_dept){
                                    if(!empty($depts) && is_array($depts)):
                                        $black = '';
                                        if($count > 1){
                                            for($j=1;$j<$count;$j++){
                                                $black .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                                            }
                                        }
                                        for($i=0,$len=count($depts);$i<$len;$i++):
                                            echo '<option value="' . $depts[$i]['id'] . '">' . $black . $depts[$i]['name'] . '</option>';
                                            if(!empty($depts[$i]['child'])):
                                                $step = $count + 1;
                                                $show_dept($depts[$i]['child'],$step);
                                            endif;
                                        endfor;
                                    endif;
                                };?>
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
                                    <volist name="members" id="vo">
                                        <tr data-node="{$vo.id}">
                                            <th>
                                                <div class="checkbox">
                                                    <label>
                                                        <input class="colored-blue" type="checkbox" value="{$vo.id}"><span class="text">{$vo.id}</span>
                                                    </label>
                                                </div>
                                            </th>
                                            <td>{$vo.name}</td>
                                            <td>{$vo['status'] == 1?'启用':'禁用'}</td>
                                        </tr>
                                    </volist>
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
                                                    <img class="avatar" src="__IMAGE__/avatars/adam-jansen.jpg">
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
                                                                    if(!empty($depts[$i]['child'])):
                                                                        $step = $count + 1;
                                                                        $show_dept($depts[$i]['child'],$step);
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
                                                    <volist name="position" id="vo">
                                                        <option value="{$vo.name}" data-node="{$vo.id}">{$vo.name}</option>
                                                    </volist>
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