<!-- <% if(session.getAttribute("Type")==null){ %>
   <jsp:forward page = "Error.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <jsp:include page="ManagerHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==2){%>
   <jsp:include page="UserHeader.jsp" />
<%}else{%>
   <jsp:forward page = "Error.jsp" />
<%}%> -->
<?php require ('Header.php') ?>
<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="EditProfile" method="post">
                    <div style="top:10%;" class="login-form">
                        <h1>Edit Profile</h1><br>
                        <div class="form-group ">
                            <div class="fileUpload btn btn-primary">
                                <button type="button" class="log-btn" >Upload Picture</button>
                                <input type="file" name="Picture" placeholder="Picture" id="Picture" class="upload"/>
                            </div>
                        </div>
                        <div class="form-group " >
                            <input type="text" name="Name" class="form-control" placeholder="Name" id="Name" value="<%= session.getAttribute("Name") %>">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-group ">
                            <input type="email" name="Email" class="form-control" placeholder="Email" id="Email" value="<%= session.getAttribute("Email") %>">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="form-group log-status">
                            <input type="password" name="Password" class="form-control" placeholder="Password" id="Password" value="<%= session.getAttribute("Password") %>">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group log-status">
                            <input type="text" name="Contact" class="form-control" placeholder="Contact" id="Contact" value="<%= session.getAttribute("Contact") %>">
                            <i class="fa fa-phone"></i>
                        </div>
                        <button type="submit" class="log-btn" >Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>