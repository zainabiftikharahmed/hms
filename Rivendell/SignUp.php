<?php
session_start();
if(!isset($_SESSION["UserName"])) {
    require_once ('Header.php');
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
                <form action="../Controllers/User/User.php" method="post">
                    <div class="login-form">
                        <h1>Sign Up</h1><br>
                        <div class="form-group ">
                            <input type="text" name="UserName" class="form-control" placeholder="Name " id="UserName" required>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-group ">
                            <input type="email" name="UserEmail" class="form-control" placeholder="Email " id="UserEmail" required>
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="form-group log-status">
                            <input type="password" name="UserPassword" class="form-control" placeholder="Password" id="UserPassword" required >
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group ">
                            <input type="text" name="UserContact" class="form-control" placeholder="Contact " id="UserContact" required>
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="form-group ">
                            <input type="checkbox" name="TermsAndConditions" required> I agree to <a href="#">Terms and Conditions</a><br>
                        </div>
                        <span class="alert">Invalid Credentials</span>
                        <button type="submit" name="SignUp" class="log-btn" >Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php'); ?>
