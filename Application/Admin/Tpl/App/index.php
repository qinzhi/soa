<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px">
                <div class="input-group col-xs-2">
                    <span class="input-group-addon">状态</span>
                    <select style="width: 200px">
                        <option>请选择状态</option>
                        <option>启用</option>
                        <option>禁用</option>
                    </select>
                </div>
                <a class="btn btn-success" id="update_app" href="javascript:void(0);" style="float: right;margin-top: -34px;">保存</a>
            </div><!--Widget Header-->
            <div class="widget-body plugins_app-">
                <div class="row">
                    <div class="col-xs-6 col-md-4 tissue_tree">
                        <div class="well">
                            <table class="table table-bordered table-condensed table-hover table-focus">
                                <thead>
                                <tr>
                                    <th>
                                        名称
                                    </th>
                                    <th>
                                        状态
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="lists" id="vo">
                                    <tr data-node="{$vo.agentid}">
                                        <td>
                                            <img src="{$vo.round_logo_url}" style="width: 60px;">
                                            {$vo.name}
                                        </td>
                                        <td>
                                            {$vo['status']==1?'启用':'禁用'}
                                        </td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="well">
                            <input id="id" type="hidden"/>
                            <form class="form-horizontal bv-form form-app">
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
                                                <button type="button" class="btn btn-success select-app">选择</button>
                                            </span>
                                            <div class="app-root well with-header">
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