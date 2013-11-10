<?php

class Util {

    /**
     * @var object  Store current object
     */
    private static $_objInstance;

    /**
     * Singleton Pattern
     *
     * Auto Create Object Instance.
     *
     */
    public static function getInstance() {
        if (null === self::$_objInstance) {
            self::$_objInstance = new Util();
        }
        return self::$_objInstance;
    }

    /**
     * Constructor
     *
     * Initialize things.
     *
     */
    function __construct() {
        
    }

    /**
     * Generate Guid with microsoft standard
     *
     * @return GUID
     */
    function CreateGuid() {
        mt_srand((double) microtime() * 10000);
        $charid = strtolower(md5(uniqid(rand(), true)));
        $hyphen = chr(45); // "-"
        $uuid = substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12);
        return $uuid;
    }

    function upload($file,$beginname,$name='') {
        $_FILES = $file;
        $fileTypes = '';
        $filename = '';
        $beginname = $beginname.'-';
        // Define a destination
        $targetFolder = '../../images/upload/'; // Relative to the root
       
        if (!empty($_FILES)) {
            $filename = $beginname.date('YmdHis').'-'.strtolower($_FILES[$name]['name']);
            $tempFile = $_FILES[$name]['tmp_name'];
//            $targetPath = $targetFolder;//$_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = $targetFolder.$filename;//rtrim($targetPath, '/') . '/' .$filename;
            if($beginname == 'home-' && $name == 'keyvisual'){
                $fileTypes =array('swf','jpg', 'jpeg', 'gif', 'png','JPG', 'JPEG', 'GIF', 'PNG');
            }else{
                // Validate the file type
                $fileTypes = array('jpg', 'jpeg', 'gif', 'png','JPG', 'JPEG', 'GIF', 'PNG'); // File extensions
            }
            
            
            $fileParts = pathinfo(strtolower($_FILES[$name]['name']));

            if (in_array($fileParts['extension'], $fileTypes)) {
                 move_uploaded_file($tempFile,$targetFile).'</br>';
				return $filename;
            } else {
					
                return null;
            }
        }
    }
    
    function deleteFile($filename) {
        $targetFolder = '../../images/upload/';
        //$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
        $targetFile = $targetFolder.$filename;//rtrim($targetPath, '/') . '/' .$filename;
        //var_dump($targetPath);
        if (file_exists($targetFile)){
            unlink($targetFile);
        }
    }

}

?>