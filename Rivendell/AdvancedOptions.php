<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/28/2018
 * Time: 12:16 AM
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

    <section id="main">
        <div class="full-width-container">
            <div class="full-image-hover">
                <div class="hover-fade"></div>
                <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
                <div class="content-wrap">
                    <form method="post">
                        <div style="top:20%;" class="login-form">
                            <h1>Advanced Options</h1><br>
                            <div class="form-group ">
                                <button type="submit" class="log-btn" style="color: white" onClick="form.action='DeleteUsers.php'">Show All Users</button>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="log-btn" style="color: white" onClick="form.action='DeleteComments.php'">Show All Comments</a></button>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="log-btn" style="color: white" onClick="form.action='DeleteRooms.php'">Show All Rooms</a></button>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="log-btn" style="color: white" onClick="form.action='DeleteBookings.php'">Show All Bookings</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>