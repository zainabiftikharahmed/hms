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
?>

    <section id="main">
        <div class="full-width-container">
            <div class="full-image-hover">
                <div class="hover-fade"></div>
                <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
                <div class="content-wrap">
                    <form action="../Controllers/Booking.php" method="post">
                        <div class="login-form">
                            <h1>Select Dates</h1><br>
                            <div class="form-group ">
                                <input type="text" name="CheckInDate" class="form-control" placeholder="Check-In Date" id="CheckInDate" readonly>
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="CheckOutDate" class="form-control" placeholder="Check-Out Date" id="CheckOutDate" readonly>
                                <i class="fa fa-calendar"></i>
                            </div>
                            <button type="submit" class="log-btn" name="SearchRoom">Search Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>