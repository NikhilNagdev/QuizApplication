<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/3/2019
 * Time: 4:20 AM
 */

require_once "db/tables/User.class.php";

$rs = User::select("name, email, password", "user_id = 1");

while($user = $rs->fetch()){
    echo "<br>NAME = ".$user->name;
    echo "<br>Email = ".$user->email;
    echo "<br>Password = ".$user->password;
}

$tp = new User();
$tp->name = "Harlan";
$tp->username = "Harlan";

echo "<br>";

$tp->update("user_id = 2");