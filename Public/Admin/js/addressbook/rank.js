/**
 * Created by Administrator on 2015/6/8.
 */
/**
 * Created by Administrator on 2015/6/8.
 */
$(function(){
    var rank = {
        showData : function(value){
            rank.id = value.id;
            var form = $('.plugins_rank- form');
            form.find('input[name=name]').val(value.name);
            var index = form.find('select[name=status]')
                .find('option[value=' + value.status + ']').index();
            form.find('select[name=status]').get(0).selectedIndex = index;
            form.find('input[name=sort]').val(value.sort);
            form.find('input[name=remark]').val(value.remark);
        }
    };

    $("#add_rank").on('click', function () {
        bootbox.dialog({
            message: function(){
                var form = $('#addModal .col-md-12 .form-rank');
                if(form.html() == ''){
                    form.append($('form.form-rank').html());
                    form.append('<input name="type" value="add" type="hidden"/>');
                }
                else{form[0].reset();}
                form.find('.rank-root').hide();
                return $("#addModal").html();
            },
            title: "添加级别",
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
                        $('.modal-dialog form.form-rank').submit();
                    }
                }
            }
        });
    });

    $('#del_rank').click(function(){
        if(rank.id){
            bootbox.confirm("是否删除?", function (result) {
                if (result) {
                    if(rank.id){
                        set_loading('show');
                        $.post('/addressbook/del_rank',{id:rank.id},function(data){
                            if(data==3){
                                $('tr[data-node=' + rank.id + ']').remove();
                                delete rank.id;
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

    $('#update_rank').click(function(){
        var params = $('.plugins_rank- form').serialize();
        if(rank.id){
            set_loading('show');
            params += '&id=' + rank.id;
            $.post('/addressbook/update_rank',{params:params},function(data){
                if(data==2){
                    $('tr[data-node=' + rank.id + ']').find('td:last').html($('select[name=status]').find('option:selected').text());
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
            rank.id = $(this).data('node');
            set_loading('show');
            $.post('/addressbook/get_rank',{id:rank.id},function(value){
                if(value != ''){
                    value = eval('(' + value + ')');
                    rank.showData(value);
                    set_loading('hide');
                }
            });
        }
    });
});


