<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/18/2018
 * Time: 7:57 PM
 */


if(isset($_POST['SignUp'])) {
    $name =$_POST['UserName'];
    $contact = $_POST['UserContact'];
    $email = $_POST['UserEmail'];
    $password = $_POST('UserPassword');

    //$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')" ;
    //if(mysqli_query($con,$sql))
    //    echo"OK";

}


if(isset($_POST['SignIn'])){
    $email = $_POST['UserEmail'];
    $password = $_POST('UserPassword');

}


if(isset($_POST['EditProfile'])){


}
