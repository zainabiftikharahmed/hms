<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/18/2018
 * Time: 11:45 PM
 */


use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");


$tableName = 'Room';

//Add a room
if(isset($_POST['AddRoom'])) {

    $item = $marshaler->marshalJson('{
            "Number": ' . $_POST['RoomNumber'] . ',
            "Description": "' . $_POST['RoomDescription'] . '",
            "Price": ' . $_POST['RoomPrice'] . '
        }
        ');
    try {
        //See if email already exists
        $response = $dynamodb->getItem(['TableName' => $tableName, 'Key' => ['Number' => ['N' => $_POST['RoomNumber']]]]);
        if (!empty($response['Item'])) {
            echo('Room already exists');
        }
        else {
            //Make the item in table
            $dynamodb->putItem(['TableName' => $tableName, 'Item' => $item]);
            header("location:../Rivendell/DeleteRooms.php");
        }
    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Add features to a room
if(isset($_POST['SetFeatures'])){

    $features;
    if(!empty($_POST['features'])) {
        $checked_count = count($_POST['features']);
        $x = 0;

        foreach ($_POST['features'] as $selected) {
            $features[$x++] = $selected;
        }

        $ExpressionAttributeValues ;

        switch ($checked_count) {
            case 1:
                $ExpressionAttributeValues  = $marshaler->marshalJson('{
                ":r": ' . $_POST['RoomNumber'] . ',
                ":f": [ "' . $features[0] . '"]}');
                break;
            case 2:
                $ExpressionAttributeValues  = $marshaler->marshalJson('{
                ":r": ' . $_POST['RoomNumber'] . ',
                ":f": [ "' . $features[0] . '" , "' . $features[1] . '"]}');
                break;
            case 3:
                $ExpressionAttributeValues  = $marshaler->marshalJson('{
                ":r": ' . $_POST['RoomNumber'] . ',
                ":f": [ "' . $features[0] . '" , "' . $features[1] . '", "' . $features[2] . '"]}');
                break;
            case 4:
                $ExpressionAttributeValues  = $marshaler->marshalJson('{
                ":r": ' . $_POST['RoomNumber'] . ',
                ":f": [ "' . $features[0] . '" , "' . $features[1] . '", "' . $features[2] . '", "' . $features[3] . '"]}');
                break;
        }

        $params = [
            'TableName' => $tableName,
            'Key' => ['Number' => ['N' => $_POST['RoomNumber']]],
            'UpdateExpression' => 'set Features = :f',
            'ConditionExpression' => '#roomNumber = :r',
            'ExpressionAttributeNames' => ['#roomNumber' => 'Number'],
            'ExpressionAttributeValues' =>  $ExpressionAttributeValues ,
            'ReturnValues' => 'UPDATED_NEW'
        ];

        try {
            $result = $dynamodb->updateItem($params);
            header("location:../Rivendell/DeleteRooms.php");

        } catch (DynamoDbException $e) {
            header("location:../Rivendell/Error.php");
        }
    }
    else
        header("location:../Rivendell/SetRoomFeatures.php");
}


//Add features to a room
if(isset($_POST['SetRoomPrice'])) {

     $ExpressionAttributeValues  = $marshaler->marshalJson('
    {
        ":r": ' . $_POST['RoomNumber'] . ',
        ":p": ' . $_POST['RoomPrice'] . '
    }
    ');

    $params = [
        'TableName' => $tableName,
        'Key' => ['Number' => ['N' => $_POST['RoomNumber']]],
        'UpdateExpression' =>
            'set Price = :p',
        'ConditionExpression' => '#roomNumber = :r',
        'ExpressionAttributeNames' => ['#roomNumber' => 'Number'],
        'ExpressionAttributeValues' => $ExpressionAttributeValues,
        'ReturnValues' => 'UPDATED_NEW'
    ];
    try {
        $result = $dynamodb->updateItem($params);
        header("location:../Rivendell/DeleteRooms.php");

    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Delete a room
if(isset($_POST['DeleteRoom'])) {

    if(!empty($_POST['rooms'])) {
        $checked_count = count($_POST['rooms']);
        foreach ($_POST['rooms'] as $selected) {
            try {
                $response = $dynamodb->deleteItem(['TableName' => $tableName, 'Key' => ['Number' => ['N' => $selected]]]);
            } catch (DynamoDbException $e) {
                header("location:../Rivendell/Error.php");
            }
        }
        header("location:../Rivendell/DeleteRooms.php");
    }
}



//Add pictures for a room
if(isset($_POST["SetRoomPicture"])){
    session_start();
    $bucket = 'hotelfamily02';
    $file_Path = 'C:\Users\Acer\Desktop/' . $_POST["Picture"];
    $key = $_POST['RoomNumber'];

    try {
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $key,
            'SourceFile' => $file_Path,
        ]);
        header("location:../Rivendell/Gallery.php");

    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
}


//Add pictures for a room
if(isset($_POST["DeleteRoomPicture"])){
    session_start();
    $bucket = 'hotelfamily02';
    $key = $_POST['RoomNumber'];

    try {
        $result = $s3->deleteObject([
            'Bucket' => $bucket,
            'Key' => $key,
        ]);
        header("location:../Rivendell/Gallery.php");

    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
}