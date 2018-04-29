<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/26/2018
 * Time: 3:04 PM
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

$tableName = 'User';
$ids;
$x = -1;

do {
    try {

        $response = $dynamodb->scan(['TableName' => $tableName, 'ConditionExpression' => 'attribute_exists(Name)']);
        foreach ($response['Items'] as $item) {
            if (isset($item['Name'])) {
                $ids[$x + 1][0] = $marshaler->unmarshalValue($item['Email']);
                $x++;
            }
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
                    <form action="../Controllers/User.php" method="post">
                        <div style="width: 500px; top:10%; bottom: 10%"  class="login-form">
                            <h1>CONFIGURE USERS</h1><br>
                            <div class="form-group ">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">EMAIL</th>
                                        <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">DELETE</th>
                                    </tr>
                                    <!--Use a while loop to make a table row for every DB row-->
                                    <?php foreach ($ids as $selected) { ?>
                                        <tr>
                                            <th style="width:250px" class="form-control"><?php  echo ($selected[0]); ?></th>
                                            <th style="width:250px" class="form-control">
                                                <label>
                                                    <input type="checkbox" name="users[]"
                                                           value=<?php echo ($selected[0]) ; ?>
                                                           </label>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit"  name="DeleteUser" class="log-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>