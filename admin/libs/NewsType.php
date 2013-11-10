<?php

require_once 'PDOAdapter.php';
require_once 'BaseClass.php';

class NewsType extends BaseClass{

    function __construct() {
        /**
         * Get DB
         */
        parent::__construct();
        $this->table ='NewsType';
        
    }

    function EntityEmptry() {
        $entity[0]['created_date']='';
        $entity[0]['id']='';
        return $entity;
    }

    function getDataTable() {
    
        $sql = "SELECT * FROM NewsType ";

        $result = PDOAdpter::getInstance()->select($sql);

        return $result;
    }
}