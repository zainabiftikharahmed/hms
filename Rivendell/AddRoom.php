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
                        <h1>Add Room</h1><br>
                        <div class="form-group ">
                            <input type="number" name="RoomNumber" class="form-control" placeholder="Room Number" id="RoomNumber">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="form-group " >
                            <textarea rows="3" cols="25" type="text" name="RoomDescription" class="form-control" placeholder="Description" id="Description"></textarea>
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="form-group ">
                            <input type="number" name="RoomPrice" class="form-control" placeholder="Price" id="Price">
                            <i class="fa fa-money"></i>
                        </div>
                        <button type="submit" class="log-btn" name="AddRoom" >Add Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php') ?>