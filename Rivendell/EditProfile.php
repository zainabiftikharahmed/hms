<?php
session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        require ("UserHeader.php");
}
else
    require ("Header.php");
?>
    <section id="main">
        <div class="full-width-container">
            <div class="full-image-hover">
                <div class="hover-fade"></div>
                <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
                <div class="content-wrap">
                    <form action="../Controllers/User.php" method="post">
                        <div style="top:10%;" class="login-form">
                            <h1>Edit Profile</h1><br>
                            <div class="form-group ">
                                <div class="fileUpload btn btn-primary">
                                    <button type="button" class="log-btn" >Upload Picture</button>
                                    <input type="file" name="ProfilePicture" placeholder="Picture" id="Picture" class="upload"/>
                                </div>
                            </div>
                            <div class="form-group " >
                                <input type="text" name="UserName" class="form-control" placeholder="Name" id="Name" value=<?php echo $_SESSION["Name"]?>>
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group ">
                                <input type="email" name="UserEmail" class="form-control" placeholder="Email" id="Email" value=<?php echo $_SESSION["Email"]?>>
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="form-group log-status">
                                <input type="password" name="UserPassword" class="form-control" placeholder="Password" id="Password" value=<?php echo $_SESSION["Password"]?>>
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="form-group log-status">
                                <input type="text" name="UserContact" class="form-control" placeholder="Contact" id="Contact" value=<?php echo $_SESSION["Contact"]?>>
                                <i class="fa fa-phone"></i>
                            </div>
                            <button type="submit" class="log-btn" name="EditProfile">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>