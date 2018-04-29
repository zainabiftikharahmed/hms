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
            header("location:../Rivendell/Comments.php");
        }
    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
}



//Deletes user's comments
if(isset($_POST['DeleteComments'])) {
    if (!empty($_POST['comments'])) {
        $checked_count = count($_POST['comments']);
        $x = 0;

        foreach ($_POST['comments'] as $selected) {
            $p  = (explode("/", $selected));
            $key = $marshaler->marshalJson('{ "Identifier": "' . $p[0] . '", "Email": "' . $p[1] . '"}');
            try {
                $result = $dynamodb->deleteItem([
                    'TableName' => $tableName,
                    'Key' => $key]);
                header("location:../Rivendell/DeleteComments.php");

            } catch (DynamoDbException $e) {
                header("location:../Rivendell/Error.php");
            }
        }
    }
}