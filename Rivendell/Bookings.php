<?php
session_start();
if(!isset($_SESSION["UserName"])) {
    require ('Header.php');
}
elseif ($_SESSION(['UserRole'] == 0)) {
    require_once ('UserHeader.php');
}
elseif ($_SESSION(['UserRole'] == 1)) {
    require_once('AdminHeader.php');
}
?>
<?php require ('Footer.php') ?>