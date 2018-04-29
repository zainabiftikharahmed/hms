<?php
session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        require ("UserHeader.php");
}
else
    header("location:Error.php");

use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");

$tableName = 'Room';
$ids;
$x = -1;

try {
    //Get all available rooms stored in the session after booking.php
    foreach ($_SESSION["AvailableRooms"] as $room) {
        $response = $dynamodb->getItem(['TableName' => 'Room', 'Key' => ['Number' => ['N' => (string)$room]]]);

        //Store each room's attributes
        $ids[$x + 1][0] = $marshaler->unmarshalValue($response['Item']['Number']);
        $ids[$x + 1][1] = $marshaler->unmarshalValue($response['Item']['Description']);
        $ids[$x + 1][2] = $marshaler->unmarshalValue($response['Item']['Price']);

        //Exception thrown if we try to access features that are not set
        if (isset($response['Item']['Features'])) {
            $arr = $marshaler->unmarshalValue($response['Item']['Features']);
            $ids[$x + 1][3] = "";
            foreach ($arr as $feature) {
                $ids[$x + 1][3] = $ids[$x + 1][3] . $feature . "<br/>";
            }
        } else
            $ids[$x + 1][3] = "No features configured.";
        $x++;
    }
} catch (DynamoDbException $e) {
    echo($e->getMessage());
}

?>

<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="../Controllers/Booking.php" method="post">
                    <div style="width: 1000px; top:10%; bottom: 10%"  class="login-form">
                        <h1>BOOK ROOMS</h1><br>
                        <div class="form-group ">
                            <table>
                                <tbody>
                                <tr>
                                    <th style="height:15px; width:150px; background:#2c9cb6; color:white" class="form-control">ROOM</th>
                                    <th style="height:15px; width:300px; background:#2c9cb6; color:white" class="form-control">DESCRIPTION</th>
                                    <th style="height:15px; width:150px; background:#2c9cb6; color:white" class="form-control">PRICE</th>
                                    <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">FEATURES</th>
                                    <th style="height:15px; width:150px; background:#2c9cb6; color:white" class="form-control">BOOK</th>
                                </tr>
                                <!--Use a while loop to make a table row for every DB row-->
                                <?php foreach ($ids as $selected) { ?>
                                    <tr>
                                        <th style="width:150px" class="form-control"><?php  echo ($selected[0]); ?></th>
                                        <th style="width:300px" class="form-control"><?php  echo ($selected[1]); ?></th>
                                        <th style="width:150px" class="form-control"><?php  echo ($selected[2]); ?></th>
                                        <th style="width:250px" class="form-control"><?php  echo ($selected[3]); ?></th>
                                        <th style="width:150px" class="form-control">
                                            <input type="checkbox" name="bookings[]"
                                                   value=<?php echo ($selected[0]) ; ?>
                                                   </label>
                                        </th>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit"  name="BookRoom" class="log-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>
                        

