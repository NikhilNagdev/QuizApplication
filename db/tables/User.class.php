<?php
/**
 * Created by PhpStorm.
 * User.class: admin
 * Date: 5/3/2019
 * Time: 1:01 AM
 */


require_once "db/core/Table.class.php";
require_once "db/core/TableCRUD.class.php";


class User extends Table
{
    public static $tableName = "user";

    public static function select($rows, $condition = 1){
        return TableCRUD::select(self::$tableName, $rows, $deleted = 0, $condition);
    }

    public function insert(){
        parent::addCreatedAt();
        TableCRUD::insert(self::$tableName, $this->column_values);
    }

    public function update($condition=1){
        TableCRUD::update(self::$tableName, $this->column_values, $condition);
    }

    public static function delete($condition){
        TableCRUD::delete(self::$tableName, $condition);
    }
}