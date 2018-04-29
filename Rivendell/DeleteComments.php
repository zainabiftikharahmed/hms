<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/24/2018
 * Time: 10:39 AM
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

$tableName = 'Review';
$ids;
$x = -1;

do {
    try {
        $response = $dynamodb->scan(['TableName' => $tableName]);
        foreach ($response['Items'] as $item) {
            $ids[$x + 1][0] = $marshaler->unmarshalValue($item['Identifier']);
            $ids[$x + 1][1] = $marshaler->unmarshalValue($item['Email']);
            $ids[$x + 1][2] = $marshaler->unmarshalValue($item['Message']);
            $ids[$x + 1][3] = $marshaler->unmarshalValue($item['Rating']);

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
                    <form action="../Controllers/Review.php" method="post">
                        <div style="width: 1000px" class="login-form">
                            <h1>CONFIGURE COMMENTS</h1><br>
                            <div class="form-group ">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">IDENTIFIER</th>
                                        <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">EMAIL</th>
                                        <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">RATING</th>
                                        <th style="height:15px; width:750px; background:#2c9cb6; color:white" class="form-control">MESSAGE</th>
                                        <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">DELETE</th>
                                    </tr>
                                    <!--Use a while loop to make a table row for every DB row-->
                                    <?php foreach ($ids as $selected) { ?>
                                        <tr>
                                            <th style="width:250px" class="form-control"><?php  echo ($selected[0]); ?></th>
                                            <th style="width:250px" class="form-control"><?php  echo ($selected[1]); ?></th>
                                            <th style="width:250px" class="form-control"><?php  echo ($selected[3]); ?></th>
                                            <th style="width:250px" class="form-control"><?php  echo ($selected[2]); ?></th>
                                            <th style="width:250px" class="form-control">
                                                <label>
                                                    <input type="checkbox" name="comments[]"
                                                           value=<?php echo ($selected[0] . "/" . $selected[1]) ; ?>
                                                    </label>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit"  name="DeleteComments" class="log-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>