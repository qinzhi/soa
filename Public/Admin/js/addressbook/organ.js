$(function(){
    $('.dept-root').append($('.tissue_tree > div.well').html());

    var dept = {
        showData : function(value){
            dept.id = value.id;
            $('.plugins_dept- form').find('input[name=name]').val(value.name);
            $('.plugins_dept- form').find('input[name=short_name]').val(value.short_name);
            $('.plugins_dept- form').find('input[name=p_id]').val(value.pid);
            if(value.pid){
                var p_name = $('.tissue_tree a[data-node=' + value.pid + ']').find('span').text();
            }else{
                var p_name = '';
            }
            $('.plugins_dept- form').find('input[name=p_name]').val(p_name);
            $('.plugins_dept- form').find('select[name=grade_id]')
                .find('option[value=' + value.dept_grade_id + ']').attr('selected',true);

            $('.plugins_dept- form').find('input[name=sort]').val(value.sort);
            $('.plugins_dept- form').find('input[name=remark]').val(value.remark);
        }
    };
    $(this).on('click','.tree_menu a',function(){
        $(this).parents('.well').find(".tree_menu a.active").removeClass("active");

        $(this).addClass("active");
        var node = $(this).data('node');
        var name = $(this).find('span').text();
        var dept_root   =   $(this).parents('.dept-root');
        if(dept_root.length){

            dept_root.hide();
            dept_root.parent().find('input[name=p_name]').val(name);
            dept_root.parent().find('input[name=p_id]').val(node);
        }else{
            if(dept.node != node){
                set_loading('show');
                $.post('/addressbook/get_dept',{id:node},function(value){
                    if(value != ''){
                        value = eval('(' + value + ')');
                        dept.node = value.id;
                        dept.showData(value);
                        set_loading('hide');
                    }
                });
            }

        }
        return false;
    });

    $(this).on('click','.select-dept',function(){
        var dept_root   =   $(this).parents('.input-group').find('.dept-root');
        if(dept_root.is(':hidden')){
            dept_root.slideDown();
        }else{
            dept_root.slideUp();
        }
    });

    $("#add_dept").on('click', function () {
        bootbox.dialog({
            message: function(){

                if($('#addModal .col-md-12 .form-dept').html() == ''){
                    $('#addModal .col-md-12 .form-dept').append($('form.form-dept').html());
                    $('#addModal .form-dept').append('<input name="type" value="add" type="hidden"/>');
                }
                else{$('#addModal .form-dept')[0].reset();}
                $('#addModal .form-dept .dept-root').hide();
                return $("#addModal").html();
            },
            title: "添加部门",
            className: "modal-darkorange",
            buttons: {
                "cancel": {
                    label: "取消",
                    className: "btn-default",
                    callback: function () { }
                },
                "confirm": {
                    label: "确定",
                    className: "btn-success",
                    callback: function () {
                        //console.log(arguments);
                        //console.log($('#addModal .form-dept').find('input[name=name]'),1111);
                        $('.modal-dialog form.form-dept').submit();
                    }
                }
            }
        });
    });

    $('#del_dept').click(function(){
        if(dept.id){
            bootbox.confirm("是否删除?", function (result) {
                if (result) {
                    if(dept.id){
                        set_loading('show');
                        $.post('/addressbook/del_dept',{id:dept.id},function(data){
                            if(data==3){
                                $('a[data-node=' + dept.id + ']').parent().remove();
                                delete dept.id;
                                Notify('删除成功', 'bottom-right', '5000', 'success', 'fa-check', true);
                            }else if(data==-3){
                                Notify('删除失败', 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                            }
                            set_loading('hide');
                        });
                    }
                }
            });
        }else{
            Notify('请选择部门', 'bottom-right', '5000', 'warning', 'fa-warning', true);
        }
    });

    $('#update_dept').click(function(){
        var params = $('.plugins_dept- form').serialize();
        if(dept.id){
            set_loading('show');
            params += '&id=' + dept.id;
            $.post('/addressbook/update_dept',{params:params},function(data){
                if(data==2){
                    $('a[data-node=' + dept.id + ']').find('span')
                        .text($('.plugins_dept- form').find('input[name=name]').val());
                    Notify('更新成功', 'bottom-right', '5000', 'success', 'fa-check', true);
                }else if(data==-2){
                    Notify('更新失败', 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                }
                set_loading('hide');
            });
        }else{
            Notify('请选择部门', 'bottom-right', '5000', 'warning', 'fa-warning', true);
        }

    });
});
