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
    $src = array_shift(C('TMPL_PARSE_STRING')) . '/JS' . $_SERVER["REQUEST_URI"];
    if(is_file(PROJECT_PATH . $src . '.js')){
        echo '<script src="' . $src . '.js"></script>';
    }
?>