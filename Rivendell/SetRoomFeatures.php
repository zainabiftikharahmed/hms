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
                <form action="SetRoomFeatures" method="post">
                    <div style="top:3%;" class="login-form">
                        <h1>Room Features</h1><br>
                        <div class="form-group " >
                            <input type="number" name="RoomID" class="form-control" placeholder="Room ID" id="RoomID">
                            <i class="fa fa-number"></i>
                        </div>
                        <div class="form-group ">
                            <select class="form-control" name="RoomType" id="RoomType">
                                <option  selected disabled>Room Type</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Suite">Suite</option>
                            </select>
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="form-group " >
                            <input style="width: 14%" class="form-control" type="checkbox" name="Feature1" value="1">
                            <input style="width: 85%" class="form-control" value="Television" readonly>
                        </div>
                        <div class="form-group " >
                            <input style="width: 14%" class="form-control" type="checkbox" name="Feature2" value="1">
                            <input style="width: 85%" class="form-control" value="Telephone" readonly>
                        </div>
                        <div class="form-group " >
                            <input style="width: 14%" class="form-control" type="checkbox" name="Feature3" value="1">
                            <input style="width: 85%" class="form-control" value="Air Conditioning Unit" readonly>
                        </div>
                        <div class="form-group">
                            <input style="width: 14%" class="form-control" type="checkbox" name="Feature4" value="1">
                            <input style="width: 85%" class="form-control" value="Attached Bathroom" readonly>
                        </div>
                        <button type="submit" class="log-btn" >Set Features</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>