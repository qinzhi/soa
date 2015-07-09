$(function(){
    $('.row-details').click(function(){
        var node = $(this).data('node');console.log(node);
        if($(this).hasClass('fa-plus-square-o')){
            $(this).removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
            $('tr[data-node='+node+']').show();
        }else{
            $(this).removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
            $('tr[data-node='+node+']').hide();
        }
    });
});
