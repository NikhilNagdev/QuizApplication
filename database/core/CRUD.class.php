<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/11/2019
 * Time: 7:47 AM
 */

class CRUD{

    public $selectQuery = "SELECT ";
    private $where = "WHERE";
    private $tableName;

    public function select($tablename, ...$rows){
        foreach ($rows as $row){
            $this->selectQuery .= $row.", ";
        }
        $this->selectQuery = substr($this->selectQuery, 0, -2);
        $this->selectQuery.= " FROM ".$tablename;
//        echo $this->selectQuery;
        return $this;
    }

    public function where($column, $value, $operator = "="){
        $this->where = " WHERE {$column} {$operator} '{$value}'";
        $this->selectQuery .= $this->where;
        echo $this->selectQuery;
        return $this;
    }

    public function get(){
        return $pdo->query($selectQuery);
    }

}

$crud = new CRUD();
$crud->select("user", "id", "name")
     ->where("name", "nikhil");
echo $crud->selectQuery;