<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 15:56
 */

if(!function_exists('create_editor')){
    function create_editor($id,$value='',$config=array()){
        // Include the CKEditor class.
        include_once "Public/Admin/Ckeditor/ckeditor.php";
        // Create a class instance.
        $CKEditor = new CKEditor( 'http://' . $_SERVER['HTTP_HOST'] . '/Public/Admin/Ckeditor/');
        // Path to the CKEditor directory, ideally use an absolute path instead of a relative dir.
        //   $CKEditor->basePath = '/ckeditor/'
        // If not set, CKEditor will try to detect the correct path.

        // Replace a textarea element with an id (or name) of "editor1".

        $_config['filebrowserBrowseUrl'] = '/Public/Admin/Ckfinder/ckfinder.html';
        $_config['filebrowserImageBrowseUrl'] = '/Public/Admin/Ckfinder/ckfinder.html?Type=Images';
        //$_config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        //$_config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        if(!empty($config)){
            $_config = array_merge($_config,$config);
        }
        $CKEditor->editor("describe",$value,$_config);
        //$CKEditor->replace("describe");
    }
}

function get_letter($string) {
    $charlist = mb_str_split($string);
    return implode(array_map("get_first_char", $charlist));
}
function mb_str_split($string) {
    // Split at all position not after the start: ^
    // and not before the end: $
    return preg_split('/(?<!^)(?!$)/u', $string);
}
function get_first_char($s0) {
    $fchar = ord(substr($s0, 0, 1));
    if (($fchar >= ord("a") and $fchar <= ord("z")) or ($fchar >= ord("A") and $fchar <= ord("Z")))
        return strtoupper(chr($fchar));
    $s = iconv("UTF-8", "GBK", $s0);
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
    if ($asc >= -20319 and $asc <= -20284)
        return "A";
    if ($asc >= -20283 and $asc <= -19776)
        return "B";
    if ($asc >= -19775 and $asc <= -19219)
        return "C";
    if ($asc >= -19218 and $asc <= -18711)
        return "D";
    if ($asc >= -18710 and $asc <= -18527)
        return "E";
    if ($asc >= -18526 and $asc <= -18240)
        return "F";
    if ($asc >= -18239 and $asc <= -17923)
        return "G";
    if ($asc >= -17922 and $asc <= -17418)
        return "H";
    if ($asc >= -17417 and $asc <= -16475)
        return "J";
    if ($asc >= -16474 and $asc <= -16213)
        return "K";
    if ($asc >= -16212 and $asc <= -15641)
        return "L";
    if ($asc >= -15640 and $asc <= -15166)
        return "M";
    if ($asc >= -15165 and $asc <= -14923)
        return "N";
    if ($asc >= -14922 and $asc <= -14915)
        return "O";
    if ($asc >= -14914 and $asc <= -14631)
        return "P";
    if ($asc >= -14630 and $asc <= -14150)
        return "Q";
    if ($asc >= -14149 and $asc <= -14091)
        return "R";
    if ($asc >= -14090 and $asc <= -13319)
        return "S";
    if ($asc >= -13318 and $asc <= -12839)
        return "T";
    if ($asc >= -12838 and $asc <= -12557)
        return "W";
    if ($asc >= -12556 and $asc <= -11848)
        return "X";
    if ($asc >= -11847 and $asc <= -11056)
        return "Y";
    if ($asc >= -11055 and $asc <= -10247)
        return "Z";
    return null;
}

/**
 * 发送HTTP请求方法，目前只支持CURL发送请求
 * @param  string $url    请求URL
 * @param  array  $params 请求参数
 * @param  string $method 请求方法GET/POST
 * @return array  $data   响应数据
 */
function http($url, $params, $method = 'GET', $header = array(), $multi = false) {
    $opts = array(CURLOPT_TIMEOUT => 30, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false, CURLOPT_HTTPHEADER => $header);

    /* 根据请求类型设置特定参数 */
    switch(strtoupper($method)) {
        case 'GET' :
            $opts[CURLOPT_URL] = $url . '?' . str_replace("&amp;", "&", http_build_query($params));
            break;
        case 'POST' :
            //判断是否传输文件
            //$params = $multi ? $params : http_build_query($params);

            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default :
            throw new Exception('不支持的请求方式！');
    }

    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($error)
        throw new Exception('请求发生错误：' . $error);
    return $data;
}