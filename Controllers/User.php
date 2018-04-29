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
    //Create item for the user
    $item = $marshaler->marshalJson('{
            "Name": "' . $_POST['UserName'] . '",
            "Contact": "' . $_POST['UserContact'] . '",
            "Email": "' . $_POST['UserEmail'] . '",
            "Password": "' . $_POST['UserPassword'] . '",
            "PictureName": "' . 'Null' . '"
        }
        ');
    try {
        //See if email already exists
        $response = $dynamodb->getItem(['TableName' => $tableName, 'Key' => ['Email' => ['S' => $_POST['UserEmail']]]]);
        if (!empty($response['Item'])) {
            echo('Email already exists');
        }
        else {
            //Make the item in table
            $dynamodb->putItem(['TableName' => $tableName, 'Item' => $item]);
            header("location:../Rivendell/SignIn.php");
        }
    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Log In Method
if(isset($_POST['SignIn'])) {

    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];

    try {
        $result = $dynamodb->getItem(['TableName' => $tableName, 'Key' => ['Email' => ['S' => $email]]]);
        if ($password == $result["Item"]["Password"]["S"]) {
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
    $ExpressionAttributeValues = [':c' => ['S' => $_POST['UserContact']],
        ':p' => ['S' => $_POST['UserPassword']],
        ':n' => ['S' => $_POST['UserName']],
        ':e' => ['S' => $_POST['UserEmail']]];


    $params = ['TableName' => $tableName,
        'Key' => ['Email' => ['S' => $_POST['UserEmail']]],
        'UpdateExpression' => 'set Contact = :c, Password = :p, #personName = :n',
        'ConditionExpression' => 'Email = :e',
        'ExpressionAttributeNames' => ['#personName' => 'Name'],
        'ExpressionAttributeValues' => $ExpressionAttributeValues,
        'ReturnValues' => 'ALL_NEW'];

    try {
        $response = $dynamodb->updateItem($params);

        $result = $dynamodb->getItem(['TableName' => $tableName, 'Key' => ['Email' => ['S' => $_POST['UserEmail']]]]);
        $_SESSION["Name"] = $result["Item"]["Name"]["S"];
        $_SESSION["Contact"] = $result["Item"]["Contact"]["S"] ;
        $_SESSION["Password"] = $result["Item"]["Password"]["S"] ;

        echo($result["Item"]["Name"]["S"]);
        header("location:../Rivendell/Profile.php");

    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Edit Profile Picture
if( isset($_POST['EditProfilePicture'])) {
    session_start();
    $bucket = 'hotelfamily01';
    $file_Path = 'C:\Users\Acer\Desktop/' . $_POST["ProfilePicture"];
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

        $ExpressionAttributeValues = [':p' => ['S' => $url],
            ':e' => ['S' => $key]];


        $params = ['TableName' => $tableName,
            'Key' => ['Email' => ['S' => $key]],
            'UpdateExpression' => 'set PictureName = :p',
            'ConditionExpression' => 'Email = :e',
            'ExpressionAttributeValues' => $ExpressionAttributeValues,
            'ReturnValues' => 'ALL_NEW'];

        try {
            $result = $dynamodb->updateItem($params);
            $_SESSION["Profile"] = $url ;
            header("location:../Rivendell/ProfilePicture.php");
            echo ($url);
        } catch (DynamoDbException $e) {
            header("location:../Rivendell/Error.php");
        }

    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
}


//Delete User  Method
if( isset($_POST['DeleteUser'])){

    $bucket = 'hotelfamily01';

    if(!empty($_POST['users'])) {
        $checked_count = count($_POST['users']);
        foreach ($_POST['users'] as $selected) {
            try {
                $response = $dynamodb->deleteItem(['TableName' => $tableName, 'Key' => ['Email' => ['S' => $selected]]]);
                $key = $selected;

                try {
                    $result = $s3->deleteObject([
                        'Bucket' => $bucket,
                        'Key' => $key
                    ]);
                } catch (S3Exception $e) {
                    header("location:../Rivendell/Error.php");
                }
            } catch (DynamoDbException $e) {
                header("location:../Rivendell/Error.php");
            }
        }
        header("location:../Rivendell/DeleteUsers.php");
    }
}
