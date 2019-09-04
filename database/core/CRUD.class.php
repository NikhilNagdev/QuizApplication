<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11-06-2019
 * Time: 01:40 AM
 */
//require_once "DB.class.php";
require_once "Connection.class.php";

class CRUD
{

    /**
     * This constructor is used to initialize the pdo object
     */
    function __construct()
    {
        $this->pdo = Connection::connectToDB();
        date_default_timezone_set('Asia/Kolkata');
    }

    //CRUD FUNCTIONS

    /**
     * This method is used to insert values in database tables
     * @param $fieldValue It is an array which will contain the column name and it's value that is
     * to be inserted in the table
     * @return bool
     */
    public function insert($fieldValue)
    {
        $preparedStatement = $this->getPDOdStatement($this->createQueryString($fieldValue, "insert"));
        $status = $preparedStatement->execute(array_values($fieldValue));
        if(!$status){
            echo $this->createQueryString($fieldValue, "insert");
            echo "<br>".$preparedStatement->errorInfo()[2];
        }else{
            return $status;
        }
    }

    /**
     * This method is used to update fields in database tables
     * @param $fieldValue an array of co lumns and their values that are be changed
     * @return bool returns true if values were successfully updated and false if
     * values were not updated
     */
    public function update($fieldValue){
        $this->query = $this->createQueryString($fieldValue, "update");
        $arrayValues = array_values($fieldValue);
        for($i=0; $i<count($arrayValues); $i++){
            array_unshift($this->values, $arrayValues[$i]);
        }
        return $this->get();
    }

    /**
     * This method specifies the columns to be selected
     * @param array $columns It is an array of columns to be selected
     * @return CRUD - returns the object which called this method
     */
    public function select(...$columns){
        $this->query = $this->createQueryString($columns, "select")." FROM ".$this->current_table;
        return $this;
    }

    //HELPER FUNCTIONS
    /**
     * This method is used to create the query string which is to be executed for DB operation
     * @param $fieldValue It is an array which will contain the column name and it's value
     * @param $queryType It will specify for which query type the string is to be created
     * @return string the created string
     */
    public function createQueryString($fieldValue, $queryType){
        if(strcasecmp($queryType, "insert") == 0){
            $values=""; $field = "";
            $count=0;
            foreach ($fieldValue as $key=>$value){
                $field.=$key;
                $values.="?";
                $count++;
                if($count != count($fieldValue)){
                    $field.=",";
                    $values.=",";
                }
            }
            if($this->pdo->query("SHOW COLUMNS FROM ".$this->current_table." LIKE 'created_at'")->fetch()){
                $field .= ",created_at";
                $values .=  ",'".$this->getCurrentDT()."'";
            }
            return "INSERT INTO {$this->current_table} (".$field.") VALUES "."(".$values.")";
        }
        else if(strcasecmp($queryType, "update") == 0){
            $field = "";
            $count=0;
            foreach ($fieldValue as $key=>$value){
                $field.=$key."="."?";
                $count++;
                if($count != count($fieldValue)){
                    $field.=",";
                }
            }
            if($this->pdo->query("SHOW COLUMNS FROM ".$this->current_table." LIKE 'updated_at'")->fetch()){
                $field .= ", updated_at = "."'".$this->getCurrentDT()."'";
            }
            return "UPDATE {$this->current_table} SET $field";
        }
        else if(strcasecmp($queryType, "select") == 0){
            $query = "SELECT ";
            foreach ($fieldValue as $column){
                $query .= $column.", ";
            }
                   //this is used to remove the last "," and " " that was added
            return substr($query, 0, -2);
        }
    }

    /**
     * This method returns the PDOStatement object
     * @param $query query for which PDOStatement object is to returned
     * @return bool|PDOStatement object
     */
    private function getPDOdStatement($query){
        return $this->pdo->prepare($query);
    }


    /**
     * This method injects where clause to the query that we want to execute
     * @param $column the name of column
     * @param $value the value to be checked
     * @param string $operator the comparision operator
     * @param string $conditionalOperator this argument is used when andWhere and orWhere method is called
     * it contains "and" when andWhere is called and "or" when orWhere is called
     * @return CRUD
     */
    public function where($column, $value, $operator = "=", $conditionalOperator=""){
        if(strlen($conditionalOperator) != 0){
            $this->where .= " $conditionalOperator {$column} {$operator} ?";
        }else{
            $this->where = " WHERE {$column} {$operator} ?";
        }
        $this->values[$this->i++] = $value;

        return $this;
    }

    public function limit($limitValue){
        $this->limit = " LIMIT ".$limitValue;
        return $this;
    }

    public function orderBy($orderType){
        $this->orderBy = " ORDER BY ".$orderType;
        return $this;
    }

    private function buildQuery(){
        $this->query.=$this->join.$this->where.$this->groupBy.$this->orderBy.$this->limit;
    }

    /**
     * This method executes the query and returns the result when query is executed
    */
    public function get(){
        try{
            $this->buildQuery();
//            echo($this->count++."".$this->query);
            $pdoStatement = $this->getPDOdStatement($this->query);
//            echo "<br>".($this->query);
//            echo "<br>".print_r($this->values);
            for($i=0; $i<count($this->values); $i++){
                $pdoStatement->bindValue($i+1, $this->values[$i]);
            }
            $status = $pdoStatement->execute();
            $this->values = array();
            $this->query = "";
            $this->where = "";
            $this->join = "";
            $this->groupBy = "";
            $this->orderBy = "";
            $this->limit = "";
            $this->i=0;
            if($status){
                return $pdoStatement;
            }else{
                echo "<br>".($pdoStatement->errorInfo()[2]);
            }
        }catch(PDOException $e){
            die($e);
        }
    }

    public function executeQuery($query, ...$values){
        $pdoStatement = $this->getPDOdStatement($query);
        for($i=0; $i<count($values); $i++){
            $pdoStatement->bindValue($i+1, $values[$i]);
        }
        $status = $pdoStatement->execute();
        if($status){
            return $pdoStatement;
        }else{
            echo "<br>".($pdoStatement->errorInfo()[2]);
            return null;
        }
    }

    public function getCurrentDT(){

        return date('Y-m-d H:i:s');
    }

    //MAGIC METHOD

    /**
     * This method is used to create andWhere and orWhere method when user calls these functions
     */
    public function __call($name, $arguments){
        //checking if andWhere was called or orWhere was called
        if(preg_match('/(.+)Where$/', $name,$matches)){
            if(isset($arguments[2]))//to check if any comparision operator was passes
                return $this->where($arguments[0], $arguments[1], $arguments[2], $matches[1]);
            return $this->where($arguments[0], $arguments[1], "=", $matches[1]);
        }
        else if(preg_match('/(.+)Join$/',$name)){
            if ($name==="leftJoin")
                $LRJoin = "LEFT";
            elseif($name==="rightJoin")
                $LRJoin = "RIGHT";
            else
                $LRJoin = "INNER";
            if(isset($arguments[3]) && $arguments[3]!=="=")
                $operator=$arguments[3];
            else
                $operator="=";
            return $this->join($arguments[0],$arguments[1],$arguments[2],$operator,$LRJoin);
        }
    }


    public function join($tableName,$columnName1,$columnName2,$operatorType="=",$forLeftRight="")
    {
        $this->join .= " ".$forLeftRight." JOIN ". $tableName . " ON " . $columnName1 ." ".$operatorType." " . $columnName2;
        return $this;
    }

    public function groupBy($column){
        $this->groupBy = " GROUP BY $column";
        return $this;
    }

    public static function table($tableName){
        $obj = new CRUD();
        $obj->current_table = $tableName;
        return $obj;
    }

    /*Variable declarations*/
    private $current_table;
    public $pdo;
    private $join="";
    private $query;
    private $where = "";
    private $values = array();
    private $i = 0;
    private $limit = "";
    private $orderBy = "";
    private $groupBy = "";
    private $count = 0;
    /*End of variable declarations*/
}
