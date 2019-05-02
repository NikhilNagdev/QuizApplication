<?php
/**
 * Created by PhpStorm.
 * User.class: admin
 * Date: 5/2/2019
 * Time: 11:37 PM
 */

require_once "config.php";

class Connection
{
    /*Variable declarations*/
    private static $pdo;
    private static $dataSourceName = "mysql:host=".HOST.";dbname=".DB;
    /*End of variable declarations*/

    /**
     * This method will initialize a PDO object
     */
    public static function connectToDB(){
        try{
            self::$pdo = new PDO(self::$dataSourceName, USERNAME, PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch(PDOException $exception){
            die("Some error occurred while connecting to db " .$exception);
        }
    }
}
