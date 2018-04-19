<?php
session_start();
if(!isset($_SESSION["UserName"])) {
    header("location:Error.php");
}
elseif ($_SESSION(['UserRole'] == 0)) {
    require_once ('UserHeader.php');
}
elseif ($_SESSION(['UserRole'] == 1)) {
    require_once('AdminHeader.php');
}
?>
    <section id="main">
        <div class="full-width-container">
            <div class="full-image-hover">
                <div class="hover-fade"></div>
                <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
                <div class="content-wrap">
                    <form action="../Controllers/User/User.php" method="post">
                        <div style="top:10%;" class="login-form">
                            <h1>Edit Profile</h1><br>
                            <div class="form-group ">
                                <div class="fileUpload btn btn-primary">
                                    <button type="button" class="log-btn" >Upload Picture</button>
                                    <input type="file" name="ProfilePicture" placeholder="Picture" id="Picture" class="upload"/>
                                </div>
                            </div>
                            <div class="form-group " >
                                <input type="text" name="UserName" class="form-control" placeholder="Name" id="Name" value=($_SESSION(['UserName'] %>">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group ">
                                <input type="email" name="UserEmail" class="form-control" placeholder="Email" id="Email" value="<%= session.getAttribute("Email") %>">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="form-group log-status">
                                <input type="password" name="UserPassword" class="form-control" placeholder="Password" id="Password" value="<%= session.getAttribute("Password") %>">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="form-group log-status">
                                <input type="text" name="UserContact" class="form-control" placeholder="Contact" id="Contact" value="<%= session.getAttribute("Contact") %>">
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