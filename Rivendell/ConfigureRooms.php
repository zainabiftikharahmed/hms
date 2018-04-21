<?php
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
                        <h1>Configure Rooms</h1><br>
                        <div class="form-group ">
                            <button type="submit" class="log-btn" style="color: white" onClick="form.action='SetRoomPrice.php'">Set Room Price</button>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="log-btn" style="color: white" onClick="form.action='SetRoomFeatures.php'">Set Room Features</a></button>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="log-btn" style="color: white" onClick="form.action='SetRoomPicture.php'">Set Room Picture</a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>