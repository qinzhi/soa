<?php
/*
 * CKFinder
 * ========
 * http://cksource.com/ckfinder
 * Copyright (C) 2007-2014, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */
if (!defined('IN_CKFINDER')) exit;

/**
 * @package CKFinder
 * @subpackage Config
 * @copyright CKSource - Frederico Knabben
 */

/**
 * This class keeps resource types configuration
 *
 * @package CKFinder
 * @subpackage Config
 * @copyright CKSource - Frederico Knabben
 */
class CKFinder_Connector_Core_ResourceTypeConfig
{
    /**
     * Resource name
     *
     * @var string
     * @access private
     */
    private $_name = "";
    /**
     * Resource url
     *
     * @var string
     * @access private
     */
    private $_url = "";
    /**
     * Directory path on a server
     *
     * @var string
     * @access private
     */
    private $_directory = "";
    /**
     * Max size
     *
     * @var unknown_type
     * @access private
     */
    private $_maxSize = 0;
    /**
     * Array with allowed extensions
     *
     * @var array[]string
     * @access private
     */
    private $_allowedExtensions = array();
    /**
     * Array with denied extensions
     *
     * @var array[]string
     * @access private
     */
    private $_deniedExtensions = array();
    /**
     * used for CKFinder_Connector_Core_Config object caching
     *
     * @var CKFinder_Connector_Core_Config
     * @access private
     */
    private $_config;

    /**
     * Get ResourceType configuration
     *
     * @param string $resourceTypeNode
     * @return array
     *
     */
    function __construct($resourceTypeNode)
    {
        if (isset($resourceTypeNode["name"])) {
            $this->_name = $resourceTypeNode["name"];
        }

        if (isset($resourceTypeNode["url"])) {
            $this->_url = $resourceTypeNode["url"];
        }

        if (!strlen($this->_url)) {
            $this->_url = "/";
        }
        else if(substr($this->_url,-1,1) != "/") {
            $this->_url .= "/";
        }

        if (isset($resourceTypeNode["maxSize"])) {
            $this->_maxSize = CKFinder_Connector_Utils_Misc::returnBytes((string)$resourceTypeNode["maxSize"]);
        }

        if (isset($resourceTypeNode["directory"])) {
            $this->_directory = $resourceTypeNode["directory"];
        }

        if (!strlen($this->_directory)) {
            $this->_directory = resolveUrl($this->_url);
        }

        if (isset($resourceTypeNode["allowedExtensions"])) {
            if (is_array($resourceTypeNode["allowedExtensions"])) {
                foreach ($resourceTypeNode["allowedExtensions"] as $e) {
                    $this->_allowedExtensions[] = strtolower(trim((string)$e));
                }
            }
            else {
                $resourceTypeNode["allowedExtensions"] = trim((string)$resourceTypeNode["allowedExtensions"]);
                if (strlen($resourceTypeNode["allowedExtensions"])) {
                    $extensions = explode(",", $resourceTypeNode["allowedExtensions"]);
                    foreach ($extensions as $e) {
                        $this->_allowedExtensions[] = strtolower(trim($e));
                    }
                }
            }
        }

        if (isset($resourceTypeNode["deniedExtensions"])) {
            if (is_array($resourceTypeNode["deniedExtensions"])) {

                foreach ($resourceTypeNode["deniedExtensions"] as $extension) {
                    $this->_deniedExtensions[] = strtolower(trim((string)$e));
                }
            }
            else {
                $resourceTypeNode["deniedExtensions"] = trim((string)$resourceTypeNode["deniedExtensions"]);
                if (strlen($resourceTypeNode["deniedExtensions"])) {
                    $extensions = explode(",", $resourceTypeNode["deniedExtensions"]);
                    foreach ($extensions as $e) {
                        $this->_deniedExtensions[] = strtolower(trim($e));
                    }
                }
            }
        }
    }

    /**
     * Get name
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Get url
     *
     * @access public
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * Get directory
     *
     * @access public
     * @return string
     */
    public function getDirectory()
    {
        return $this->_directory;
    }

    /**
     * Get max size
     *
     * @access public
     * @return int
     */
    public function getMaxSize()
    {
        return $this->_maxSize;
    }

    /**
     * Get allowed extensions
     *
     * @access public
     * @return array[]string
     */
    public function getAllowedExtensions()
    {
        return $this->_allowedExtensions;
    }

    /**
     * Get denied extensions
     *
     * @access public
     * @return array[]string
     */
    public function getDeniedExtensions()
    {
        return $this->_deniedExtensions;
    }

    /**
     * Check extension, return true if file name is valid.
     * Return false if extension is on denied list.
     * If allowed extensions are defined, return false if extension isn't on allowed list.
     *
     * @access public
     * @param string $extension extension
     * @param boolean $renameIfRequired whether try to rename file or not
     * @return boolean
     */
    public function checkExtension(&$fileName, $renameIfRequired = true)
    {
        if (strpos($fileName, '.') === false) {
            return true;
        }

        if (is_null($this->_config)) {
            $this->_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        }

        if ($this->_config->getCheckDoubleExtension()) {
            $pieces = explode('.', $fileName);

            // First, check the last extension (ex. in file.php.jpg, the "jpg").
            if ( !$this->checkSingleExtension( $pieces[sizeof($pieces)-1] ) ) {
                return false;
            }

            if ($renameIfRequired) {
                // Check the other extensions, rebuilding the file name. If an extension is
                // not allowed, replace the dot with an underscore.
                $fileName = $pieces[0] ;
                for ($i=1; $i<sizeof($pieces)-1; $i++) {
                    $fileName .= $this->checkSingleExtension( $pieces[$i] ) ? '.' : '_' ;
                    $fileName .= $pieces[$i];
                }

                // Add the last extension to the final name.
                $fileName .= '.' . $pieces[sizeof($pieces)-1] ;
            }
        }
        else {
            // Check only the last extension (ex. in file.php.jpg, only "jpg").
            return $this->checkSingleExtension( substr($fileName, strrpos($fileName,'.')+1) );
        }

        return true;
    }

    /**
     * Check given folder name
     * Return true if folder name matches hidden folder names list
     *
     * @param string $folderName
     * @access public
     * @return boolean
     */
    public function checkIsHiddenFolder($folderName)
    {
        if (is_null($this->_config)) {
            $this->_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        }

        $regex = $this->_config->getHideFoldersRegex();
        if ($regex) {
            return preg_match($regex, $folderName);
        }

        return false;
    }

    /**
     * Check given file name
     * Return true if file name matches hidden file names list
     *
     * @param string $fileName
     * @access public
     * @return boolean
     */
    public function checkIsHiddenFile($fileName)
    {
        if (is_null($this->_config)) {
            $this->_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        }

        $regex = $this->_config->getHideFilesRegex();
        if ($regex) {
            return preg_match($regex, $fileName);
        }

        return false;
    }

    /**
     * Check given path
     * Return true if path contains folder name that matches hidden folder names list
     *
     * @param string $folderName
     * @access public
     * @return boolean
     */
    public function checkIsHiddenPath($path)
    {
        $_clientPathParts = explode("/", trim($path, "/"));
        if ($_clientPathParts) {
            foreach ($_clientPathParts as $_part) {
                if ($this->checkIsHiddenFolder($_part)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check if extension is allowed
     * Return true if the extension is allowed.
     *
     * @param string $extension
     * @access public
     * @return boolean
     */
    public function checkSingleExtension($extension)
    {
        $extension = strtolower(ltrim($extension,'.'));

        if (sizeof($this->_deniedExtensions)) {
            if (in_array($extension, $this->_deniedExtensions)) {
                return false;
            }
        }

        if (sizeof($this->_allowedExtensions)) {
            return in_array($extension, $this->_allowedExtensions);
        }

        return true;
    }

    /**
     * Generate hash for current resource type
     *
     * @access public
     * @return string 16 digit hash
     */
    public function getHash(){
      return substr(md5($this->getDirectory()), 0, 16);
    }

    /**
     * 检查资源空间大小
     */
    public function checkResourceSpaceSize(){

        if(is_null($this->_config)){
            $this->_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        }

        $resource_space_size = $this->_config->getResource_Space_Size();

        $unit_type = $resource_space_size['unit_type'];

        $level = $resource_space_size['vip_type'];

        $total_size = $resource_space_size['member_level'][$level];
        $_REQUEST['resource_space_size'] =  $total_size . strtoupper($unit_type);


        $resource_root_dir = $this->_config->getResource_Root_Dir();

        if(is_dir($resource_root_dir)){

            $current_resource_space = $this->_get_real_size($this->_get_dir_size($resource_root_dir),$unit_type);

            $current_resource_space = explode(' ',$current_resource_space);
            $current_size = $current_resource_space[0];
            $unit = $current_resource_space[1];

            if(is_numeric($current_size) && $total_size > $current_size){
                $_REQUEST['remain_space_size'] = $total_size - $current_size . $unit;
                return TURE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }


    }

    // 获取文件夹大小
    private function _get_dir_size($dir)
    {
        $sizeResult='';
        $handle = opendir($dir);
        while (false!==($FolderOrFile = readdir($handle)))
        {
            if($FolderOrFile != "." && $FolderOrFile != "..")
            {
                if(is_dir("$dir/$FolderOrFile"))
                {
                    $sizeResult += $this->_get_dir_size("$dir/$FolderOrFile");
                }
                else
                {
                    $sizeResult += filesize("$dir/$FolderOrFile");
                }
            }
        }
        closedir($handle);

        return $sizeResult;
    }

    // 单位自动转换函数
    private function _get_real_size($size,$type)
    {
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte

        switch($type){
            case 'b':
                return $size." B";
                break;
            case 'kb':
                return round($size/$kb,2)." KB";
                break;
            case 'mb':
                return round($size/$mb,2)." MB";
                break;
            case 'gb':
                return round($size/$gb,2)." GB";
                break;
            case 'tb':
                return round($size/$tb,2)." TB";
                break;
        }
        /*
            if($size < $kb)
            {
                return $size." B";
            }
            else if($size < $mb)
            {
                return round($size/$kb,2)." KB";
            }
            else if($size < $gb)
            {
                return round($size/$mb,2)." MB";
            }
            else if($size < $tb)
            {
                return round($size/$gb,2)." GB";
            }
            else
            {
                return round($size/$tb,2)." TB";
            } */

    }
}
