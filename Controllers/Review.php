<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/18/2018
 * Time: 11:46 PM
 */

use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");

$tableName = 'Review';


//Adds Review in database
if(isset($_POST['AddReview'])){
    session_start();

    $id = uniqid();

    //JSON item to add
    $item = $marshaler->marshalJson('{
            "Identifier": "' . $id . '",
            "Email": "' . $_SESSION["Email"] . '",
            "Message": "' . $_POST['ReviewSubmitted'] . '"
        }
        ');

    try {
        //See if identifier and email combination already exists
        $response = $dynamodb->getItem(['TableName' => $tableName, 'Key' =>
            ['Identifier' => ['S' => $id], 'Email' => ['S' => $_SESSION["Email"]]]]);
        if (!empty($response['Item'])) {
            echo('Identifier already exists');
        }
        else {
            //Make the item in table
            $dynamodb->putItem(['TableName' => $tableName, 'Item' => $item]);
            header("location:../Rivendell/index.php");
        }
    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}




if(isset($_POST['DeleteComment'])){


}