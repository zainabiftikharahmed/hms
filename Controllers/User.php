<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/18/2018
 * Time: 7:57 PM
 */


use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");


$tableName = 'User';


//Sign Up Method
if(isset($_POST['SignUp'])) {

    $name = $_POST['UserName'];
    $contact = $_POST['UserContact'];
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
    $profilepicture = 'Null';

    $item = $marshaler->marshalJson('{
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
                $_SESSION["Email"] = $email ;
                $_SESSION["Role"] = 1;
                header("location:../Rivendell/index.php");
            } else {
                session_start();
                $_SESSION["Email"] = $email ;
                $_SESSION["Name"] = $result["Item"]["Name"]["S"] ;
                $_SESSION["Contact"] = $result["Item"]["Contact"]["S"] ;
                $_SESSION["Password"] = $result["Item"]["Password"]["S"] ;
                $_SESSION["Profile"] = $result["Item"]["PictureName"]["S"];
                $_SESSION["Role"] = 0;

                header("location:../Rivendell/Profile.php");
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
if( isset($_POST['EditProfile'])) {
    session_start();
    $name = $_POST['UserName'];
    $contact = $_POST['UserContact'];
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];

    $key = $marshaler->marshalJson('
        {   
            "Email": "' . $email . '"
        }
        ');

    $eav = $marshaler->marshalJson('
    {
        ":c": "' . $contact . '",
        ":n": "' . $name . '",
        ":e": "' . $email . '",
        ":p": "' . $password . '"
    }
    ');

    $params = [
        'TableName' => $tableName,
        'Key' => $key,
        'UpdateExpression' =>
            'set Contact = :c, Password = :p, #personName = :n',
        'ConditionExpression' => 'Email = :e',
        'ExpressionAttributeNames' => ['#personName' => 'Name'],
        'ExpressionAttributeValues' => $eav,
        "ReturnValues" => 'ALL_NEW'
    ];
    try {
        $result = $dynamodb->updateItem($params);
        $_SESSION["Name"] = $result["Item"]["Name"]["S"] ;
        $_SESSION["Contact"] = $result["Item"]["Contact"]["S"] ;
        $_SESSION["Password"] = $result["Item"]["Password"]["S"] ;
        header("location:../Rivendell/Profile.php");

    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Edit Profile Picture
if( isset($_POST['EditProfilePicture'])) {
    session_start();
    $bucket = 'hotelfamily01';
    $file_Path = 'C:\Users\Acer\Desktop\Leeteuk.jpg';
    $key = $_SESSION["Email"];

    try {
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $key,
            'SourceFile' => $file_Path,
        ]);
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }

    try{
        $url = $s3->getObjectUrl($bucket, $key);
        $key = $marshaler->marshalJson('
        {   
            "Email": "' . $_SESSION["Email"] . '"
        }
        ');

        $eav = $marshaler->marshalJson('
            {
            ":e": "' . $email . '",
            ":p": "' . $url . '"
            }
            ');

        $params = [
            'TableName' => $tableName,
            'Key' => $key,
            'UpdateExpression' =>
                'set PictureName = :p',
            'ConditionExpression' => 'Email = :e',
            'ExpressionAttributeValues' => $eav,
            "ReturnValues" => 'ALL_NEW'
        ];
        try {
            $result = $dynamodb->updateItem($params);
            $_SESSION["Profile"] = $url ;
            header("location:../Rivendell/ProfilePicture.php");

        } catch (DynamoDbException $e) {
            header("location:../Rivendell/Error.php");
        }

    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
}


//Delete User  Method
if( isset($_POST['DeleteUser'])){


}
