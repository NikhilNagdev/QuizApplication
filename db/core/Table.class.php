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
}