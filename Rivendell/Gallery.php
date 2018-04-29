<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/29/2018
 * Time: 7:43 PM
 */
session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        require ("UserHeader.php");
}
else
    require ('Header.php');
?>

<?php
use Aws\DynamoDb\Exception\DynamoDbException;
require ("../config.php");

    //The bucket in which all room pictures are store
    $bucket = 'hotelfamily02';
    $x = -1;
    $arr;

    try {
        //Get all the images
        $iterator = $s3->getIterator('ListObjects',['Bucket' => $bucket]);
        foreach ($iterator as $object) {

            //Store the URL of all the images
            $arr[$x++] = $s3->getObjectUrl($bucket, $object['Key']);
        }
    }
    catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            height: 400px;
            margin: auto;
        }
    </style>

    <section id="main">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="https://room-matehotels.com/images/img/general/slide_inicio/slide_01.jpg" readonly >
                    </div>

                    <?php foreach ($arr as $selected){?>
                        <div class="item">
                            <img src=<?php echo $selected?> readonly >
                        </div>
                    <?php } ?>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>