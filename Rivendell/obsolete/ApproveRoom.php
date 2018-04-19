<!--<% if(session.getAttribute("Type")==null){ %> 
   <php:forward page = "Error.php" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <php:include page="ManagerHeader.php" />
<%}else{%>
   <php:forward page = "Error.php" />
<%}%>-->

<?php require ('Header.php') ?>
<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="SearchRoomForApproval" method="post" >
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
                        <button type="submit" class="log-btn" >Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>