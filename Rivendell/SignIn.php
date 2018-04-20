<?php
session_start();
if(isset($_SESSION["Email"])) {
    header("location:Error.php");
}
else
    require ('Header.php');
?>


<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="../Controllers/User.php" method="post">
                <div class="login-form">
                    <h1>LOG IN</h1><br>
                    <div class="form-group ">
                        <input type="email" name="UserEmail" class="form-control" placeholder="Email " id="Email">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="form-group log-status">
                        <input type="password" name="UserPassword" class="form-control" placeholder="Password" id="Password" >
                        <i class="fa fa-lock"></i>
                    </div>
                    <!--<span class="alert">Invalid Credentials</span>-->
                    <a class="link" href="#">Lost your password?</a>
                    <div id="demo"></div>
                    <button type="submit" name="SignIn" class="log-btn">Log in</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php'); ?>