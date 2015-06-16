/**
 * Created by Administrator on 2015/6/8.
 */
$(function(){
    var position = {
        showData : function(value){
            position.id = value.id;
            var form = $('.plugins_position- form');
            form.find('input[name=name]').val(value.name);
            var index = form.find('select[name=status]')
                            .find('option[value=' + value.status + ']').index();
            form.find('select[name=status]').get(0).selectedIndex = index;

            form.find('input[name=sort]').val(value.sort);
            form.find('input[name=remark]').val(value.remark);
        }
    };

    $("#add_position").on('click', function () {
        bootbox.dialog({
            message: function(){
                var form = $('#addModal .col-md-12 .form-position');
                if(form.html() == ''){
                    form.append($('form.form-position').html());
                    form.append('<input name="type" value="add" type="hidden"/>');
                }
                else{form[0].reset();}
                form.find('.position-root').hide();
                return $("#addModal").html();
            },
            title: "添加职位",
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
                        $('.modal-dialog form.form-position').submit();
                    }
                }
            }
        });
    });

    $('#del_position').click(function(){
        if(position.id){
            bootbox.confirm("是否删除?", function (result) {
                if (result) {
                    if(position.id){
                        set_loading('show');
                        $.post('/addressbook/del_position',{id:position.id},function(data){
                            if(data==3){
                                $('tr[data-node=' + position.id + ']').remove();
                                delete position.id;
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

    $('#update_position').click(function(){
        var params = $('.plugins_position- form').serialize();
        if(position.id){
            set_loading('show');
            params += '&id=' + position.id;
            $.post('/addressbook/update_position',{params:params},function(data){
                if(data==2){
                    $('tr[data-node=' + position.id + ']').find('td:last').html($('select[name=status]').find('option:selected').text());
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
            position.id = $(this).data('node');
            position.id
            set_loading('show');
            $.post('/addressbook/get_position',{id:position.id},function(value){
                if(value != ''){
                    value = eval('(' + value + ')');
                    position.showData(value);
                    set_loading('hide');
                }
            });
        }
    });
});

