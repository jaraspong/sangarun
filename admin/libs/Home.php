<?php

require_once 'PDOAdapter.php';

class Home {

    /**
     * @var object  Store current Class object
     */
    private static $_objInstance;

    /**
     * @var object  Store current DB object
     */
    private static $_dbInstance;
    private $table = 'Home';

    function __construct() {
        /**
         * Get DB
         */
        if (null === self::$_dbInstance) {
            self::$_dbInstance = PDOAdpter::getInstance();
        }
    }

    /**
     * Singleton Pattern
     *
     * Auto Create Object Instance.
     *
     */
    public static function getInstance() {
        if (null === self::$_objInstance) {
            self::$_objInstance = new Home();
        }
        return self::$_objInstance;
    }

    function insert($post) {
        unset($post['id']);
        $post['created_date'] = date('Y-m-d');
        $result = PDOAdpter::getInstance()->insert($post, $this->table, TRUE);
        
    }

    function update($post) {
        
         $post['updated_date'] = date('Y-m-d');
        //build where param
        $whereBinding = array( 'id' => $post['id'] );
        unset($post['id']);
         
        $result = PDOAdpter::getInstance()->updateQuick($this->table, $post, ' where id=?',  $whereBinding, true);
    }

    function delete($id) {
        PDOAdpter::getInstance()->deleteQuick(array('id' => $id), $this->table, true);
    }

    function selectByid($id) {
        $sql = 'select * from '.$this->table.' where id=' . $id;
        //echo $sql;
        $result = PDOAdpter::getInstance()->select($sql);
        return $result;
    }

    function EntityEmptry() {
        //$entity = new StdClass;
        $entity[0]['title_en'] = '';
        $entity[0]['title_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['desc_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['keyvisual'] = '';
        $entity[0]['video_url'] = '';
        $entity[0]['image']='';
        return $entity;
    }

    function getDataTable() {
        $sql = "select * from ".$this->table;
        $result = PDOAdpter::getInstance()->select($sql);
        return $result;
    }

    function redirect($page, $type) {
        echo "<script> alert('".$this->sms($type)."'); </script>";
        echo "<script> window.location = \"" . $page . "\"; </script>";
    }

    private function sms($type) {
        $sms = '';
        if($type === 'add'){
            $sms = "เพิ่มข้อมูลเรียบร้อย";
        }  elseif ($type ==='edit') {
           $sms = "ปรับปรุงข้อมูลเรียบร้อย"; 
        } elseif ($type ==='del') {
            $sms = "เพิ่มข้อมูลเรียบร้อย"; 
        }else{
             $sms ="กรุณาติดต่อเจ้าหน้าที่";
        }
        return $sms;
    }

}