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


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                                <input type="text" name="CheckInDate" class="form-control" placeholder="Check-In Date" id="CheckInDate">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="CheckOutDate" class="form-control" placeholder="Check-Out Date" id="CheckOutDate">
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