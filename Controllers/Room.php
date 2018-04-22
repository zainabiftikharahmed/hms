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
    $room = $_POST['RoomNumber'];
    $description = $_POST['RoomDescription'];
    $price = $_POST['RoomPrice'];


    $item = $marshaler->marshalJson('{
            "Number": ' . $room . ',
            "Description": "' . $description . '",
            "Price": ' . $price . '
        }
        ');

    $params = [
        'TableName' => $tableName,
        'Item' => $item
    ];

    try {
        $result = $dynamodb->putItem($params);
        header("location:../Rivendell/index.php");

    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Add features to a room
if(isset($_POST['SetFeatures'])){
    $room = $_POST['RoomNumber'];

    $key = $marshaler->marshalJson('
        {   
            "Number": ' . $room . '
        }
        ');

    if(!empty($_POST['features'])) {
        $checked_count = count($_POST['features']);
        $x = 0;

        foreach ($_POST['features'] as $selected) {
            $features[$x++] = $selected;
        }

        $eav;

        switch ($checked_count) {
            case 1:
                $eav = $marshaler->marshalJson('{
                ":r": ' . $room . ',
                ":f": [ "' . $features[0] . '"]}');
                break;
            case 2:
                $eav = $marshaler->marshalJson('{
                ":r": ' . $room . ',
                ":f": [ "' . $features[0] . '" , "' . $features[1] . '"]}');
                break;
            case 3:
                $eav = $marshaler->marshalJson('{
                ":r": ' . $room . ',
                ":f": [ "' . $features[0] . '" , "' . $features[1] . '", "' . $features[2] . '"]}');
                break;
            case 4:
                $eav = $marshaler->marshalJson('{
                ":r": ' . $room . ',
                ":f": [ "' . $features[0] . '" , "' . $features[1] . '", "' . $features[2] . '", "' . $features[3] . '"]}');
                break;
        }

        $params = [
            'TableName' => $tableName,
            'Key' => $key,
            'UpdateExpression' => 'set Features = :f',
            'ConditionExpression' => '#roomNumber = :r',
            'ExpressionAttributeNames' => ['#roomNumber' => 'Number'],
            'ExpressionAttributeValues' => $eav,
            'ReturnValues' => 'UPDATED_NEW'
        ];

        try {
            $result = $dynamodb->updateItem($params);
            header("location:../Rivendell/index.php");

        } catch (DynamoDbException $e) {
            echo ("$e");
        }
    }
}


//Add features to a room
if(isset($_POST['SetRoomPrice'])) {
    $room = $_POST['RoomNumber'];
    $price = $_POST['RoomPrice'];

    $key = $marshaler->marshalJson('
        {   
            "Number": ' . $room . '
        }
        ');

    $eav = $marshaler->marshalJson('
    {
        ":p": ' . $price . '
    }
    ');

    $params = [
        'TableName' => $tableName,
        'Key' => $key,
        'UpdateExpression' =>
            'set Price = :p',
        'ExpressionAttributeValues' => $eav,
        "ReturnValues" => 'ALL_NEW'
    ];
    try {
        $result = $dynamodb->updateItem($params);
        header("location:../Rivendell/index.php");

    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}


//Delete a room
if(isset($_POST['DeleteRoom'])){


}


//Make room available after checkout
if (isset($_POST['MakeAvailable'])){


}


//Add pictures for a room
if (isset($_POST['AddPictures'])){


}


//Delete pictures for a room
if (isset($_POST['DeletePictures'])){


}
