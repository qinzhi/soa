<!--Basic Scripts-->
<script src="__JS__/jquery-2.0.3.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/bootbox/bootbox.js"></script>
<script src="__JS__/toastr/toastr.js"></script>

<!--Beyond Scripts-->
<script src="__JS__/beyond.min.js"></script>
<script src="__JS__/lib.js"></script>

<?php
    $src = array_shift(C('TMPL_PARSE_STRING')) . '/JS' . $_SERVER["REQUEST_URI"];
    if(is_file(PROJECT_PATH . $src . '.js')){
        echo '<script src="' . $src . '.js"></script>';
    }
?>