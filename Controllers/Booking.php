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

//Gets all available rooms
if(isset($_POST['SearchRoom'])){
	session_start();
    $bookedRooms = [];
    $totalRooms = [];
    $availableRooms = [];

    //Get all booked rooms for the mentioned dates
    $eav = $marshaler->marshalJson('{":in": "' . $_POST['CheckInDate']. '",":out":  "' . $_POST['CheckOutDate']. '"}');
    try{
        $result = $dynamodb->scan([
            'TableName' => $tableName,
            'FilterExpression' => 'CheckIn < :out and CheckOut > :in ',
            'ExpressionAttributeValues'=> $eav
        ]);
        foreach ($result['Items'] as $i) {
            $bookedRooms[] = $marshaler->unmarshalValue($i['Room']);
        }
    } catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }


    //Get total number of rooms
    try {
        $result = $dynamodb->scan(['TableName' => 'Room']);
        foreach ($result['Items'] as $item) {
            $totalRooms[] = $marshaler->unmarshalValue($item['Number']);
        }
    }
    catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }

    //Get available rooms
    $availableRooms = array_diff($totalRooms,$bookedRooms);
    $_SESSION['AvailableRooms'] = $availableRooms;
    $_SESSION["CheckInDate"] = $_POST['CheckInDate'];
    $_SESSION["CheckOutDate"] = $_POST['CheckOutDate'];

    header("location:../Rivendell/SearchRoomResults.php");
}




//Add the selected rooms in booking
if(isset($_POST['BookRoom'])) {
    session_start();
    if (!empty($_POST['bookings'])) {
        $checked_count = count($_POST['bookings']);
        $x = 0;

        foreach ($_POST['bookings'] as $selected) {
            $id = uniqid();
            $item = $marshaler->marshalJson('{
            "Identifier": "' . $id . '",
            "Email": "' . $_SESSION["Email"] . '",
            "CheckIn": "' . $_SESSION["CheckInDate"] . '",
            "CheckOut": "' . $_SESSION["CheckOutDate"] . '",
            "Room": ' . $selected . '
         }
        ');
            try {
                //See if identifier and email combination already exists
                $response = $dynamodb->getItem(['TableName' => $tableName, 'Key' =>
                    ['Identifier' => ['S' => $id], 'Email' => ['S' => $_SESSION["Email"]]]]);
                if (!empty($response['Item'])) {
                    echo('Identifier already exists');
                } else {
                    //Make the item in table
                    $dynamodb->putItem(['TableName' => $tableName, 'Item' => $item]);
                    header("location:../Rivendell/Profile.php");
                }
            } catch (DynamoDbException $e) {
                //echo $e->getMessage();
                header("location:../Rivendell/Error.php");
            }
        }
    }
}




//Delete the booking and set room available for those dates
if(isset($_POST['DeleteBooking'])){
    if (!empty($_POST['bookings'])) {
        $checked_count = count($_POST['bookings']);
        $x = 0;

        foreach ($_POST['bookings'] as $selected) {
            $p  = (explode("/", $selected));
            $key = $marshaler->marshalJson('{ "Identifier": "' . $p[0] . '", "Email": "' . $p[1] . '"}');
            try {
                $result = $dynamodb->deleteItem([
                    'TableName' => $tableName,
                    'Key' => $key]);
                header("location:../Rivendell/DeleteBookings.php");

            } catch (DynamoDbException $e) {
                header("location:../Rivendell/Error.php");
            }
        }
    }
}

?>

