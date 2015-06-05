<layout name="Layout/col" />
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky" style="padding: 15px 11px">
                <a class="btn btn-success" id="add_dept" href="javascript:void(0);">添加</a>
                <a class="btn btn-success" href="javascript:void(0);">保存</a>
                <span> | </span>
                <a class="btn btn-danger" id="del_dept" href="javascript:void(0);">删除</a>
            </div><!--Widget Header-->
            <div class="widget-body">
                <div class="row">
                    <div class="col-xs-6 col-md-4 tissue_tree">
                        <div class="well">
                            <ul class="tree_menu">
                                <li>
                                    <a data-node="4"><i class="fa fa-angle-right level1"></i><span>小微企业</span></a>
                                    <ul class="tree_menu">
                                        <li>
                                            <a data-node="5" class=""><i class="fa fa-angle-right level2"></i><span>总经办</span></a>
                                        </li>
                                        <li>
                                            <a data-node="6" class=""><i class="fa fa-angle-right level2"></i><span>管理部</span></a>
                                            <ul class="tree_menu">
                                                <li>
                                                    <a data-node="24" class=""><i class="fa fa-angle-right level3"></i><span>总务科</span></a>
                                                </li>
                                                <li>
                                                    <a data-node="23" class=""><i class="fa fa-angle-right level3"></i><span>人事科</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a data-node="8" class=""><i class="fa fa-angle-right level2"></i><span>财务部</span></a>
                                            <ul class="tree_menu">
                                                <li>
                                                    <a data-node="25" class=""><i class="fa fa-angle-right level3"></i><span>会计科</span></a>
                                                </li>
                                                <li>
                                                    <a data-node="26" class=""><i class="fa fa-angle-right level3"></i><span>金融科</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a data-node="7" class=""><i class="fa fa-angle-right level2"></i><span>销售部</span></a>
                                        </li>
                                        <li>
                                            <a data-node="21" class=""><i class="fa fa-angle-right level2"></i><span>采购部</span></a>
                                        </li>
                                        <li>
                                            <a data-node="3" class=""><i class="fa fa-angle-right level2"></i><span>IT部</span></a>
                                        </li>
                                        <li>
                                            <a data-node="2" class=""><i class="fa fa-angle-right level2"></i><span>运营部</span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="well">
                            <input id="id" type="hidden"/>
                            <div class="form-horizontal bv-form form-dept">
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
                                                    <li>
                                                        <a data-node="1"><i class="fa fa-angle-right level1"></i><span>根节点</span></a>
                                                    </li>
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
                                            <option value="1">科</option>
                                            <option value="2">部</option>
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
                            </div>
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