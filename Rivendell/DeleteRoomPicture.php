<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/29/2018
 * Time: 8:46 PM
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
                    <form action="../Controllers/Room.php" method="post">
                        <div style="top:10%;" class="login-form">
                            <h1>Room Picture</h1><br>
                            <div class="form-group " >
                                <input type="number" name="RoomNumber" class="form-control" placeholder="Room ID" id="Name" value="RoomID">
                                <i class="fa fa-home"></i>
                            </div>
                            <button type="submit" name="DeleteRoomPicture" class="log-btn" >Delete Picture</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>