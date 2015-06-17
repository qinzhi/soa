/**
 * Created by Administrator on 2015/6/9.
 */
$(function(){
    $('.date-picker').datepicker();
    var member = {
        showData : function(value){
            member.id = value.id;
            var form = $('.plugins_member- form');
            form.find('input[name=name]').val(value.name);
            var index = form.find('select[name=status]')
                .find('option[value=' + value.status + ']').index();
            form.find('select[name=status]').get(0).selectedIndex = index;
            form.find('select[name=status]')
                .find('option[value=' + value.status + ']').attr('selected',true);

            form.find('input[name=sort]').val(value.sort);
            form.find('input[name=remark]').val(value.remark);
        }
    };

    $(this).on('click','.select-dept',function(){
        var dept_root   =   $(this).parents('.input-group').find('.dept-root');
        if(dept_root.is(':hidden')){
            dept_root.slideDown();
        }else{
            dept_root.slideUp();
        }
    });

    $("#add_member").on('click', function () {
        bootbox.dialog({
            message: function(){
                var form = $('#addModal .col-md-12 .form-member');
                if(form.html() == ''){
                    form.append($('form.form-member').html());
                    form.append('<input name="type" value="add" type="hidden"/>');
                }
                else{form[0].reset();}
                form.find('.member-root').hide();
                //$('.modal-dialog').css('width','650px !important');
                return $("#addModal").html();
            },
            title: "添加级别",
            events: {
                show : function(){
                    $('.modal-dialog').css('width','650px');
                }
            },
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
                        $('.modal-dialog form.form-member').submit();
                    }
                }
            }
        });
    });

    $('#del_member').click(function(){
        if(member.id){
            bootbox.confirm("是否删除?", function (result) {
                if (result) {
                    if(member.id){
                        set_loading('show');
                        $.post('/addressbook/del_member',{id:member.id},function(data){
                            if(data==3){
                                $('tr[data-node=' + member.id + ']').remove();
                                delete member.id;
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

        }
    });

    $('#update_member').click(function(){
        var params = $('.plugins_member- form').serialize();
        if(member.id){
            set_loading('show');
            params += '&id=' + member.id;
            $.post('/addressbook/update_member',{params:params},function(data){
                if(data==2){
                    $('tr[data-node=' + member.id + ']').find('td:last').html($('select[name=status]').find('option:selected').text());
                    Notify('更新成功', 'bottom-right', '5000', 'success', 'fa-check', true);
                }else if(data==-2){
                    Notify('更新失败', 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                }
                set_loading('hide');
            });
        }else{
            Notify('请先选择部门', 'bottom-right', '5000', 'warning', 'fa-warning', true);
        }

    });


    $('.table-focus tbody tr').click(function(){
        if(!$(this).hasClass('tr-focus')){
            $(this).parent().find('.tr-focus').removeClass('tr-focus');
            $(this).addClass('tr-focus');
            member.id = $(this).data('node');
            set_loading('show');
            $.post('/addressbook/get_member',{id:member.id},function(value){
                if(value != ''){
                    value = eval('(' + value + ')');
                    member.showData(value);
                    set_loading('hide');
                }
            });
        }
    });
});
