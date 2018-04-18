<!--<% if(session.getAttribute("Type")==null){ %>
<php:forward page = "Error.php" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
<php:include page="AdminHeader.php" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
<php:include page="ManagerHeader.php" />
<%}else if((Integer)session.getAttribute("Type")==2){%>
<php:include page="UserHeader.php" />
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
                <div style="top:1%;" class="login-form" >
                    <h1>Profile</h1><br>
                    <div class="form-group ">
                        <img src="css/img/ProfilePictures/<%= session.getAttribute("Picture")%>" onerror="this.src='css/img/ProfilePictures/Default.png'" style="width:335px; height:128px; padding:5px 5px 5px 5px;" class="form-control" >
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="<%= session.getAttribute("Name")%>" readonly>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group log-status">
                        <input type="email" class="form-control" value="<%= session.getAttribute("Email")%>" readonly>
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control" value="<%= session.getAttribute("Password")%>" readonly>
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="<%= session.getAttribute("Contact")%>" readonly>
                        <i class="fa fa-phone"></i>
                    </div>
                    <button type="submit" onclick="location.href = 'EditProfile.php';" class="log-btn">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>