<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/4/2019
 * Time: 1:22 PM
 */

class Table
{
    protected $column_values;

    public function __set($name, $value){
        $this->column_values[$name] = $value;
    }

    public function __get($name)
    {
        if(isset($name))
            return $this->column_values[$name];
    }

    public function __isset($name)
    {
        return isset($this->column_values[$name]);
    }
    public function __unset($name)
    {
        unset($this->column_values[$name]);
    }

    public function addCreatedAt(){
        date_default_timezone_set('Asia/Kolkata');
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function addUpdatedAt(){

    }

    public function addDeletedAt(){

    }

    public function addCreatedBy(){

    }

    public function addUpdatedBy(){

    }

    public function addDeletedBy(){

    }

}