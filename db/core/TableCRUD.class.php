<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/3/2019
 * Time: 1:25 AM
 */

require_once 'Connection.class.php';

class TableCRUD
{
    /*Variable declarations*/
    public static $pdo;
    private static $isIntialized = false;
    /*End of variable declarations*/

    public static function init(){
        self::$isIntialized = true;
        $conn = new Connection();
        self::$pdo = $conn::connectToDB();
    }

    public static function select($tableName, $rows, $deleted = 0, $condition = 1){
        if(self::$isIntialized == false){
            self::init();
        }
        $query = "SELECT ".$rows." FROM ".$tableName." WHERE deleted = ".$deleted." AND ".$condition;
        //echo $query;
        return self::$pdo->query($query);
    }

    public static function insert($tableName, $associativeArray){
        if(self::$isIntialized == false){
            self::init();
        }
        $keys = array_keys($associativeArray);
        $total = count($associativeArray);
        $column_names = "";
        $column_values = "";
        for($i = 0; $i < $total; $i++){
            $column_names.="$keys[$i],";
            $column_values.="?,";
        }
        $column_names = substr($column_names, 0, -1);
        $column_values = substr($column_values, 0, -1);
        $query = "INSERT INTO {$tableName} ({$column_names}) VALUES ({$column_values})";
        echo "<br>$query";
        $preparedQuery = self::$pdo->prepare($query);
        for($i = 0; $i<$total; $i++){
            $preparedQuery->bindValue($i+1, $associativeArray[$keys[$i]]);
        }
        if($preparedQuery->execute()){
            echo "true";
            return true;
        }
        return false;
    }

    public static function update($tableName, $associativeArray, $condition){
        if(self::$isIntialized == false){
            self::init();
        }
        $keys = array_keys($associativeArray);
        $total = count($associativeArray);
        $columns = "";
        for($i = 0; $i < $total; $i++){
            $columns.="$keys[$i] = ?,";
        }
        $columns = substr($columns, 0, -1);
        $query = "UPDATE $tableName SET {$columns} WHERE {$condition}";
        echo $query;
        $preparedQuery = self::$pdo->prepare($query);
        for($i = 0; $i<$total; $i++){
            $preparedQuery->bindValue($i+1, $associativeArray[$keys[$i]]);
        }
        if($preparedQuery->execute())
            echo "true";
        echo "false";
    }

    public static function delete($tableName, $condition){
        return self::update(array($tableName,"deleted=1"), $condition);
    }
}