<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/16
 * Time: 14:56
 */
namespace Admin\Lib\Org\Util;
class ArrayXml
{

    private $rootNode;

    private $doc;

    public function __construct($rootNode = ''){
        if($rootNode)$this->rootNode = $rootNode;
    }

    /**
     * 数组转xml
     * @param $data
     * @param null $xml
     * @return mixed
     */

    public function toXml($arr){

        $this->doc = new \DOMDocument('1.0','UTF-8');
        $this->doc->formatOutput = true;
        $root = $this->doc->createElement($this->rootNode);

        $this->doc->appendChild($root);

        $this->ArraytoXml($arr,$root);

        $xml_str = $this->doc->saveXML();
        $xml_str = preg_replace("/\>(\s)+\</", '><', $xml_str);
        $xml_str = trim($xml_str);
        return $xml_str;
    }

    public function ArraytoXml($arr,$node){
        foreach($arr as $key=>$value){
            if(!is_string($key)){
                $key = current(array_keys($value));
                $value = current($value);
            }
            if(is_array($value)){
                $$key = $this->doc->createElement($key);
                $this->ArraytoXml($value,$$key);
            }elseif(is_string($value)){
                $$key = $this->doc->createElement($key,$value);
            }
            $node->appendChild($$key);
        }
    }

    // Xml 转 数组, 不包括根键
    public function toArray( $xml )
    {
        $arr = $this->xml_to_array($xml);
        return $arr;
    }

    private function xml_to_array( $xml )
    {
        $reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches))
        {
            $count = count($matches[0]);
            $arr = array();
            for($i = 0; $i < $count; $i++)
            {
                $key= $matches[1][$i];
                $val = $this->xml_to_array( $matches[2][$i] );  // 递归
                if($this->xml_to_array($key, $arr))
                {
                    if(!empty($arr[$key])){
                        if(is_array($arr[$key]))
                        {
                            if(!array_key_exists(0,$arr[$key]))
                            {
                                $arr[$key] = array($arr[$key]);
                            }
                        }else{
                            $arr[$key] = array($arr[$key]);
                        }
                    }
                    $arr[$key][] = $val;
                }else{
                    $arr[$key] = $val;
                }
            }
            return $arr;
        }else{
            return $xml;
        }
    }
}