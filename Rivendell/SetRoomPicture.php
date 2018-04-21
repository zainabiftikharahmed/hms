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
                <form action="SetRoomPicture" method="post">
                    <div style="top:10%;" class="login-form">
                        <h1>Room Picture</h1><br>
                        <div class="form-group " >
                            <input type="number" name="RoomID" class="form-control" placeholder="Room ID" id="Name" value="RoomID">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="form-group ">
                            <div class="fileUpload btn btn-primary">
                                <button type="button" class="log-btn" >Upload Picture</button>
                                <input type="file" name="Picture" placeholder="Picture" id="Picture" class="upload"/>
                            </div>
                        </div>
                        <button type="submit" class="log-btn" >Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>