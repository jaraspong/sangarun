<?php

require_once 'PDOAdapter.php';
require_once 'BaseClass.php';

class Category extends BaseClass{

    function __construct() {
        /**
         * Get DB
         */
        parent::__construct();
        $this->table ='Category';
        
    }

    function EntityEmptry() {
        //$entity = new StdClass; title_en,title_jp,desc_en,desc_jp,image1,image2,image3,created_date
        $entity[0]['name_en'] = '';
        $entity[0]['name_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['desc_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['id']='';
        return $entity;
    }

    function getDataTable() {
        $sql = "select * from ".$this->table;

        $result = PDOAdpter::getInstance()->select($sql);

        return $result;
    }
    
    function  getCategory(){
        return $this->getDataTable();
    }
}