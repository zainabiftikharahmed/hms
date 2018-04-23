<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/21/2018
 * Time: 7:42 PM
 */
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
                    <form action="../Controllers/User.php" method="post">
                        <div style="top:3%; bottom: 3%" class="login-form" >
                            <img src=<?php echo $_SESSION["Profile"]?>  readonly height="400px" onerror="this.src='css/img/ProfilePictures/Default.png'" >
                            <br><br/>
                        <div>
                            </div>
                        <div class="fileUpload btn btn-primary">
                            <input type="file"  class="btn" placeholder="Picture" name="ProfilePicture" class="upload"/>
                        </div><br/>
                        <button type="submit"  name="EditProfilePicture" class="log-btn" name="EditProfile">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Footer.php') ?>


