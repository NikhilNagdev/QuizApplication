<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/3/2019
 * Time: 1:25 AM
 */

require_once 'Connection.class.php';



class Table
{
    public static function init(){
        $conn = new Connection();
        $pdo = $conn::connectToDB();
    }

    public static function select($tableName, $rows, $deleted = 0, $condition = 1){
        $query = "SELECT ".$rows." FROM ".$tableName." WHERE deleted = ".$deleted." AND ".$condition;
        $pdo->query($query);
    }

    public static function insert($tableName, $associativeArray){

    }

    public static function update($tableName, $associativeArray, $condition){

    }

    public static function delete($tableName, $condition){

    }
}