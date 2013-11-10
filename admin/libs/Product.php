<?php

require_once 'PDOAdapter.php';
require_once 'BaseClass.php';

class Product extends BaseClass{

    function __construct() {
        /**
         * Get DB
         */
        $this->table = 'Product';
    }

    function EntityEmptry() {

        //$entity = new StdClass;
        $entity[0]['id'] = '';
        $entity[0]['category_id'] = '';
        $entity[0]['title_en'] = '';
        $entity[0]['title_jp'] = '';
        $entity[0]['desc_en'] = '';
        $entity[0]['desc_jp'] = '';
        $entity[0]['thumbnail'] = '';
        $entity[0]['cat_name'] = '';
        return $entity;
    }

    function getDataTable() {
        $sql = "select a.id, concat (b.name_en,' | ',b.name_jp) cat_name, a.title_en, a.title_jp from 
                Product a ,Category b
                where a.category_id = b.id";

        $result = PDOAdpter::getInstance()->select($sql);

        return $result;
    }

}