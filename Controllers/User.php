<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/18/2018
 * Time: 7:57 PM
 */

require ("../config.php");
$tableName = 'User';


//Sign Up Method
if(isset($_POST['SignUp'])) {

    $name = $_POST['UserName'];
    $contact = $_POST['UserContact'];
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
    $profilepicture = 'Null';

    $item = $marshaler->marshalJson('
        {
            "Name": "' . $name . '",
            "Contact": "' . $contact . '",
            "Email": "' . $email . '",
            "Password": "' . $password . '",
            "PictureName": "' . $profilepicture . '"
        }
        ');

    $params = [
        'TableName' => $tableName,
        'Item' => $item
    ];

    try {
        $result = $dynamodb->putItem($params);
        header("location:../Rivendell/SignIn.php");

    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}



//Log In Method
if(isset($_POST['SignIn'])) {

    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
    $key = $marshaler->marshalJson('
        {   
            "Email": "' . $email . '"
        }
        ');
    $params = [
        'TableName' => $tableName,
        'Key' => $key
    ];

    try {
        $result = $dynamodb->getItem($params);
        if ($password = $result["Item"]["Password"]["S"]) {
            if (($result["Item"]["Status"]["BOOL"]) == true) {
                session_start();
                $_SESSION["UserName"] = $email ;
                $_SESSION["UserRole"] = 1;
                header("location:../Rivendell/index.php");
            } else {
               // session_start();
               // $_SESSION["UserEmail"] = $email ;
               // $_SESSION["UserName"] = $result["Item"]["Name"]["S"] ;
               // $_SESSION["UserContact"] = $result["Item"]["Contact"]["S"] ;
               // $_SESSION["UserPassword"] = $result["Item"]["Password"]["S"] ;
               // $_SESSION["UserRole"] = 0;
               // header("location:../Rivendell/Profile.php");
            }
        }
        else
            header("location:../Rivendell/Error.php");
    }
    catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}



//Edit Profile Method

if(isset($_POST['EditProfile'])){


}


if( isset($_POST['DeleteUser'])){


}