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
                    <form action="../Controllers/Room.php" method="post">
                        <div style="top:10%;" class="login-form">
                            <h1>Room Price</h1><br>
                            <div class="form-group " >
                                <input type="number" name="RoomNumber" class="form-control" placeholder="Room ID" id="RoomID">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="form-group ">
                                <input type="number" name="RoomPrice" class="form-control" placeholder="New Price" id="Price">
                                <i class="fa fa-money"></i>
                            </div>
                            <button type="submit" name="SetRoomPrice" class="log-btn" >Set Price</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>