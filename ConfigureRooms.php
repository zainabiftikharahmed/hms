<!-- <% if(session.getAttribute("Type")==null){ %>
   <jsp:forward page = "Error.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
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
                <form method="post">
                    <div style="top:20%;" class="login-form">
                        <h1>Configure Rooms</h1><br>
                        <div class="form-group ">
                            <button type="submit" class="log-btn" style="color: white" onClick="form.action='SetRoomPrice.jsp'">Set Room Price</button>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="log-btn" style="color: white" onClick="form.action='SetRoomFeatures.jsp'">Set Room Features</a></button>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="log-btn" style="color: white" onClick="form.action='SetRoomPicture.jsp'">Set Room Picture</a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>