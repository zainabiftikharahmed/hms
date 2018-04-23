<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/18/2018
 * Time: 11:46 PM
 */

use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");

$tableName = 'Comments';

if(isset($_POST['RateHotel'])){


}


if(isset($_POST['AddReview'])){
    session_start();
    $email = $_SESSION["Email"];
    $review = $_POST['Review'];


    $item = $marshaler->marshalJson('{
            "Email": ' . $email . ',
            "Review": "' . $review . '",
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


if(isset($_POST['AddComment'])){


}


if(isset($_POST['DeleteComment'])){


}

// TODO error handling
$response = $dynamodb->getItem(['TableName' => 'User', 'Key' => ['Email' => ['S' => 'bts@gmail.com']]]);

print_r($response);