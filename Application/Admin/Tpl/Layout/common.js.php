<!--Basic Scripts-->
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/datetime/bootstrap-datepicker.js"></script>
<script src="__JS__/bootbox/bootbox.js"></script>
<script src="__JS__/toastr/toastr.js"></script>
<script src="__CKEDITOR__/ckeditor.js"></script>
<script src="__CKFINDER__/ckfinder.js"></script>
<!--Beyond Scripts-->
<script src="__JS__/beyond.min.js"></script>

<?php
    $script = explode('/',trim($_SERVER['PATH_INFO'],'/'));
    if(count($script) === 1){
        array_push($script,'index');
    }
    $src = array_shift(C('TMPL_PARSE_STRING')) . '/JS' . '/' . implode('/',$script);
    if(is_file(PROJECT_PATH . $src . '.js')){
        echo '<script src="' . $src . '.js"></script>';
    }
?>