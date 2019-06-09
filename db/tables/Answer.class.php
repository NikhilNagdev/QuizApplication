<?php
/**
 * Created by PhpStorm.
 * User.class: admin
 * Date: 5/3/2019
 * Time: 1:00 AM
 */

require_once "db/core/Table.class.php";
require_once "db/core/TableCRUD.class.php";

class Answer
{
    public static $tableName = "answer";

    public static function select($rows, $condition = 1){
        return TableCRUD::select(self::$tableName, $rows, $deleted = 0, $condition);
    }

    public function insert(){
        TableCRUD::insert(self::$tableName, $this->column_values);
    }

    public function update($condition){
        TableCRUD::update(self::$tableName, $this->column_values, $condition);
    }

    public static function delete($condition){
        TableCRUD::delete(self::$tableName, $condition);
    }
}