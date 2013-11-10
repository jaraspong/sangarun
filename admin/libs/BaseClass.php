<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseClass
 *
 * @author moji
 */
require_once 'PDOAdapter.php';

class BaseClass {
    
    /**
     * @var object  Store current Class object
     */
    private static $_objInstance;
    /**
     * @var object  Store current DB object
     */
    private static $_dbInstance;
    protected $table = '';

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
            self::$_objInstance = new Product();
        }
        return self::$_objInstance;
    }

    public function insert($post) {
        unset($post['id']);
        $result = PDOAdpter::getInstance()->insert($post, $this->table, TRUE);
    }

    public function update($post) {
        $id = $post['id'];
        unset($post['id']);
        return PDOAdpter::getInstance()->updateQuick($this->table, $post, ' where id=?', array('id'=>$id));
    }

    public function delete($id) {
        PDOAdpter::getInstance()->deleteQuick(array('id' => $id), $this->table, FALSE);
    }

    public function selectByid($id) {
        $sql = 'select * from '.$this->table.' where id=' . $id;
        //echo $sql;
        $result = PDOAdpter::getInstance()->select($sql);
        return $result;
    }

    function redirect($page, $type) {
        echo "<script> alert('".$this->sms($type)."'); </script>";
        echo "<script> window.location = \"" . $page . "\"; </script>";
    }
    
    function customSql($sql) {
        $sql = 'select * from '.$this->table.' where id=' . $id;
        //echo $sql;
        $result = PDOAdpter::getInstance()->select($sql);
        return $result;
    }

    public function sms($type) {
        $sms = '';
        
        if($type === 'add'){
            $sms = "เพิ่มข้อมูลเรียบร้อย";
        }  elseif ($type ==='edit') {
           $sms = "ปรับปรุงข้อมูลเรียบร้อย"; 
        } elseif ($type ==='del') {
            $sms = "ลบข้อมูลเรียบร้อย"; 
        }else{
             $sms ="กรุณาติดต่อเจ้าหน้าที่";
        }
        return $sms;
    }

}

?>
