<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/29/2018
 * Time: 3:42 PM
 */

session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        header("location:Error.php");
}
else
    header("location:Error.php");
?>

<?php
use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");

$tableName = 'Booking';
$ids;
$x = -1;

do {
    try {
        $response = $dynamodb->scan(['TableName' => $tableName]);
        foreach ($response['Items'] as $item) {
            $ids[$x + 1][0] = $marshaler->unmarshalValue($item['Identifier']);
            $ids[$x + 1][1] = $marshaler->unmarshalValue($item['Email']);

            $ids[$x + 1][2] = $marshaler->unmarshalValue($item['CheckIn']);
            $ids[$x + 1][3] = $marshaler->unmarshalValue($item['CheckOut']);
            $ids[$x + 1][4] = $marshaler->unmarshalValue($item['Room']);

            $x++;
        }
    }
    catch (DynamoDbException $e) {
        header("location:../Rivendell/Error.php");
    }
} while (count($ids) <= $x);?>

    <section id="main">
        <div class="full-width-container">
            <div class="full-image-hover">
                <div class="hover-fade"></div>
                <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
                <div class="content-wrap">
                    <form action="../Controllers/Booking.php" method="post">
                        <div style="width: 1000px" class="login-form">
                            <h1>SET ROOMS AVAILABLE</h1><br>
                            <div class="form-group ">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th style="height:15px; width:200px; background:#2c9cb6; color:white" class="form-control">IDENTIFIER</th>
                                        <th style="height:15px; width:200px; background:#2c9cb6; color:white" class="form-control">EMAIL</th>
                                        <th style="height:15px; width:200px; background:#2c9cb6; color:white" class="form-control">CHECK IN</th>
                                        <th style="height:15px; width:200px; background:#2c9cb6; color:white" class="form-control">CHECK OUT</th>
                                        <th style="height:15px; width:200px; background:#2c9cb6; color:white" class="form-control">ROOM NUMBER</th>
                                        <th style="height:15px; width:200px; background:#2c9cb6; color:white" class="form-control">SET AVAILABLE</th>
                                    </tr>
                                    <!--Use a while loop to make a table row for every DB row-->
                                    <?php foreach ($ids as $selected) { ?>
                                        <tr>
                                            <th style="width:200px" class="form-control"><?php  echo ($selected[0]); ?></th>
                                            <th style="width:200px" class="form-control"><?php  echo ($selected[1]); ?></th>
                                            <th style="width:200px" class="form-control"><?php  echo ($selected[2]); ?></th>
                                            <th style="width:200px" class="form-control"><?php  echo ($selected[3]); ?></th>
                                            <th style="width:200px" class="form-control"><?php  echo ($selected[4]); ?></th>
                                            <th style="width:200px" class="form-control">
                                                <label>
                                                    <input type="checkbox" name="bookings[]"
                                                           value=<?php echo ($selected[0] . "/" . $selected[1]) ; ?>
                                                           </label>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit"  name="DeleteBooking" class="log-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>