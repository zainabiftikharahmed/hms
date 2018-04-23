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
                <form action="../Controllers/Room.php" method="post" >
                    <div style="top: 25%" class="login-form" >
                        <h1>SEARCH ROOM</h1><br>
                        <div class="form-group ">
                            <select class="form-control" name="RoomType" id="RoomType">
                                <option  selected disabled>Room Type</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Suite">Suite</option>
                            </select>
                            <i class="fa fa-search"></i>
                        </div>
                        <button type="submit" class="log-btn" name="SearchRoom">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>