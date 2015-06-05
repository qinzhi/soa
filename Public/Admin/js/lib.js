$(function(){
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'http://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-52103994-1', 'auto');
    ga('send', 'pageview');

    console.log($('.dept-root .tree_menu li'));
    $('.dept-root .tree_menu li').append($('.tissue_tree > div.well').html());
    $(".tree_menu a").click(function() {
        $(this).parents('.well').find(".tree_menu a.active").removeClass("active");
        //$(".tree_menu a.active").removeClass("active");
        $(this).addClass("active");
        /*sendAjax("/index.php?m=&c=Dept&a=read", "id=" + $(this).attr("node"), function(data) {
         showdata(data);
         });*/
        return false;
    });

    $('#select-dept').click(function(){
        $(this).parents('.input-group').find('.dept-root').slideDown();
    });

    $("#add_dept").on('click', function () {
        bootbox.dialog({
            message: function(){

                if($('#addModal .col-md-12 .form-dept').html() == ''){
                    $('#addModal .col-md-12 .form-dept').append($('div.form-dept').html());
                    $('#addModal .form-dept').append('<input name="type" value="add" type="hidden"/>');
                }
                else{$('#addModal .form-dept')[0].reset();}

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
});