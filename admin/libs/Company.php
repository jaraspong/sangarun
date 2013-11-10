<?php

require_once 'PDOAdapter.php';

class Company {

    /**
     * @var object  Store current Class object
     */
    private static $_objInstance;

    /**
     * @var object  Store current DB object
     */
    private static $_dbInstance;
    private $table = 'Company';

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
            self::$_objInstance = new Company();
        }
        return self::$_objInstance;
    }

    function insert($post) {
        unset($post['id']);
        //var_dump($post);
        $result = PDOAdpter::getInstance()->insert($post, $this->table, TRUE);
    }

    function update($post) {
        $id = $post['id'];
        unset($post['id']);
        $result = PDOAdpter::getInstance()->updateQuick($this->table, $post, ' where id=?', array('id' => $id), true);
    }

    function delete($id) {
        var_dump($id);
        //sql for name criteria
        
        PDOAdpter::getInstance()->deleteQuick(array('id' => $id), $this->table, true);
    }

    function selectByid($id) {
        $sql = 'select * from '.$this->table.' where id=' . $id;
        //echo $sql;
        $result = PDOAdpter::getInstance()->select($sql);
        return $result;
    }

    function EntityEmptry() {
        //$entity = new StdClass; id,title_en,title_jp,desc_en,desc_jp,image,created_date
        $entity[0]['title_en'] = '';
        $entity[0]['title_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['desc_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['image'] = '';
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
        $sms = "";
        if($type == 'add'){
            $sms = "เพิ่มข้อมูลเรียบร้อย";
        }  elseif ($type =='edit') {
           $sms = "ปรับปรุงข้อมูลเรียบร้อย"; 
        } elseif ($type =='del') {
            $sms = "เพิ่มข้อมูลเรียบร้อย"; 
        }else{
             $sms ="กรุณาติดต่อเจ้าหน้าที่";
        }
        return $sms;
    }

}