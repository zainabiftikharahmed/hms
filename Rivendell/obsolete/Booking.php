<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/20/2018
 * Time: 4:48 PM
 */
use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");


$tableName = 'Booking';

if(isset($_POST['SearchRoom'])){
    echo($_POST['CheckInDate']);
    echo($_POST['CheckOutDate']);

}


if(isset($_POST['SelectRoom'])){


}


if(isset($_POST['BookRoom'])){


}


/*$params = [
    'TableName' => $tableName,
];


try {
    $result = $dynamodb->scan($params);

    echo "Query succeeded.\n";

    foreach ($result['Items'] as $movie) {
        echo
            $marshaler->unmarshalValue($movie['Number']) . "\n";
    }

} catch (DynamoDbException $e) {
    echo "Unable to query:\n";
    echo $e->getMessage() . "\n";
}*/

?>