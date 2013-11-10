<?php

require_once 'PDOAdapter.php';
require_once 'BaseClass.php';

class News extends BaseClass{

    function __construct() {
        /**
         * Get DB
         */
        parent::__construct();
        $this->table ='News';
        
    }

    function EntityEmptry() {
        //$entity = new StdClass; title_en,title_jp,desc_en,desc_jp,image1,image2,image3,created_date
        $entity[0]['title_en'] = '';
        $entity[0]['title_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['desc_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['type_id']='';
        $entity[0]['type_nane']='';
        $entity[0]['id']='';
        return $entity;
    }

    function getDataTable() {
    
        $sql = "SELECT News.id,NewsType.name_en as type_name, title_en, title_jp, desc_en, desc_jp, News.created_date FROM News ";
        $sql .= "JOIN NewsType WHERE News.type_id  = NewsType.id";

        $result = PDOAdpter::getInstance()->select($sql);

        return $result;
    }
}