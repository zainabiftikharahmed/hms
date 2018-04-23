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
                    <div style="top:10%;" class="login-form">
                        <h1>Profile</h1><br>
                        <div class="form-group ">
                            <input type="text" class="form-control" value=<?php echo $_SESSION["Name"]?>  readonly>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-group log-status">
                            <input type="email" class="form-control" value=<?php echo $_SESSION["Email"]?> readonly>
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="form-group ">
                            <input type="password" class="form-control" value=<?php echo $_SESSION["Password"]?> readonly>
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form-control" value=<?php echo $_SESSION["Contact"]?> readonly>
                            <i class="fa fa-phone"></i>
                        </div>
                        <button type="submit" onclick="location.href = 'EditProfile.php';" class="log-btn">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>