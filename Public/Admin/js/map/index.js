$(function(){
    $('.map-root').append($('.tissue_tree > div.well').html());

    var map = {
        showData : function(value){
            map.id = value.id;
            var form = $('.plugins_map- form');
            form.find('input[name=name]').val(value.name);
            form.find('input[name=site]').val(value.site);
            form.find('input[name=icon]').val(value.icon);
            if(value.icon){
                form.find('input[name=icon]').parent().find('button').html('<i class="fa ' + value.icon + '"></i>');
            }else{
                form.find('input[name=icon]').parent().find('button').html('&nbsp;');
            }

            form.find('input[name=p_id]').val(value.pid);
            if(value.pid){
                var p_name = $('.tissue_tree a[data-node=' + value.pid + ']').find('span').text();
            }else{
                var p_name = '';
            }
            form.find('input[name=p_name]').val(p_name);

            form.find('input[name=sort]').val(value.sort);
        }
    };
    $(this).on('click','.tree_menu a',function(){
        $(this).parents('.well').find(".tree_menu a.active").removeClass("active");

        $(this).addClass("active");
        var node = $(this).data('node');
        var name = $(this).find('span').text();
        var map_root   =   $(this).parents('.map-root');
        if(map_root.length){

            map_root.hide();
            map_root.parent().find('input[name=p_name]').val(name);
            map_root.parent().find('input[name=p_id]').val(node);
        }else{
            if(map.node != node){
                set_loading('show');
                $.post('/map/get_map',{id:node},function(value){
                    if(value != ''){
                        value = eval('(' + value + ')');
                        map.node = value.id;
                        map.showData(value);
                        set_loading('hide');
                    }
                });
            }

        }
        return false;
    });

    $(this).on('click','.select-map',function(){
        var map_root   =   $(this).parents('.input-group').find('.map-root');
        if(map_root.is(':hidden')){
            map_root.slideDown();
        }else{
            map_root.slideUp();
        }
    });

    $(this).on('blur','input[name=icon]',function(){
        $(this).val($.trim($(this).val()));
        var icon = $(this).val();
        if(icon){
            $(this).parent().find('button').html('<i class="fa ' + icon + '"></i>');
        }else{
            $(this).parent().find('button').html('&nbsp;');
        }
    });

    $("#add_map").on('click', function () {
        bootbox.dialog({
            message: function(){

                if($('#addModal .col-md-12 .form-map').html() == ''){
                    $('#addModal .col-md-12 .form-map').append($('form.form-map').html());
                    $('#addModal .form-map').append('<input name="type" value="add" type="hidden"/>');
                }
                else{$('#addModal .form-map')[0].reset();}
                $('#addModal .form-map .map-root').hide();
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
                        //console.log($('#addModal .form-map').find('input[name=name]'),1111);
                        $('.modal-dialog form.form-map').submit();
                    }
                }
            }
        });
    });

    $('#del_map').click(function(){
        if(map.id){
            bootbox.confirm("是否删除?", function (result) {
                if (result) {
                    if(map.id){
                        set_loading('show');
                        $.post('/map/del_map',{id:map.id},function(data){
                            if(data==3){
                                $('a[data-node=' + map.id + ']').parent().remove();
                                delete map.id;
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
            Notify('请选择节点', 'bottom-right', '5000', 'warning', 'fa-warning', true);
        }
    });

    $('#update_map').click(function(){
        var params = $('.plugins_map- form').serialize();
        if(map.id){
            set_loading('show');
            params += '&id=' + map.id;
            $.post('/map/update_map',{params:params},function(data){
                if(data==2){
                    $('a[data-node=' + map.id + ']').find('span')
                        .text($('.plugins_map- form').find('input[name=name]').val());
                    Notify('更新成功', 'bottom-right', '5000', 'success', 'fa-check', true);
                }else if(data==-2){
                    Notify('更新失败', 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                }
                set_loading('hide');
            });
        }else{
            Notify('请选择节点', 'bottom-right', '5000', 'warning', 'fa-warning', true);
        }

    });
});
