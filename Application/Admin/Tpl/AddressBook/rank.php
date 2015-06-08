<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px">
                <a class="btn btn-success" id="add_rank" href="javascript:void(0);">添加</a>
                <a class="btn btn-success" id="update_rank" href="javascript:void(0);">保存</a>
                <span> | </span>
                <a class="btn btn-danger" id="del_rank" href="javascript:void(0);">删除</a>
            </div><!--Widget Header-->
            <div class="widget-body plugins_rank-">
                <div class="row">
                    <div class="col-xs-6 col-md-4">
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
                                <volist name="rank" id="vo">
                                    <tr data-node="{$vo.id}">
                                        <td>
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
                            <form class="form-horizontal bv-form form-rank" autocomplete="off">
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">名称*：</label>
                                    <div class="col-lg-8">
                                        <input name="name" value="" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">排序：</label>
                                    <div class="col-lg-8">
                                        <input name="sort" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">状态：</label>
                                    <div class="col-lg-8">
                                        <select name="status" class="form-control">
                                            <option value="1">启用</option>
                                            <option value="-1">禁用</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">简述：</label>
                                    <div class="col-lg-8">
                                        <span class="input-icon icon-right">
                                            <textarea name="remark" class="form-control"  rows="5"></textarea>
                                            <i class="fa  fa-rocket darkorange"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
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
            <form class="form-horizontal bv-form form-rank" method="post"></form>
        </div>
    </div>
</div>