<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/21/2018
 * Time: 12:08 AM
 */
session_start();
if (isset($_SESSION["Email"])){
    session_destroy();
    header("location:SignIn.php");
}
else
    header("location:Error.php");
?>