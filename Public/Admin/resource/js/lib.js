function BrowseServer(input_image,fun )
{
    var finder = new CKFinder();
    finder.basePath = '../';
    finder.selectActionFunction = SetFileField;

    finder.selectActionData = input_image;
    if($.isFunction(fun)){
        window.fun = fun;
    }
    finder.popup();
}
function getCKeditorValue(id){
    return CKEDITOR.instances[id].getData();
}
function SetFileField( fileUrl , data )
{
    split = '\/Attachments\/';
    pic = fileUrl.split(split);
    if(!!pic[1]){
        document.getElementById( (data["selectActionData"] )).value = pic[1];
    }
    if($.isFunction(window.fun)){
        window.fun(fileUrl);
    }
}

$.extend({
    panel : {
        overlay : function(){

        }
    }
});