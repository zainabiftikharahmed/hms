<!--<% if(session.getAttribute("Type")==null){ %>
   <jsp:forward page = "Error.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else{%>
   <jsp:forward page = "Error.jsp" />
<%}%>-->
<?php require ('Header.php') ?>
<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="SetRoomPicture" method="post">
                    <div style="top:10%;" class="login-form">
                        <h1>Room Picture</h1><br>
                        <div class="form-group " >
                            <input type="number" name="RoomID" class="form-control" placeholder="Room ID" id="Name" value="RoomID">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="form-group ">
                            <div class="fileUpload btn btn-primary">
                                <button type="button" class="log-btn" >Upload Picture</button>
                                <input type="file" name="Picture" placeholder="Picture" id="Picture" class="upload"/>
                            </div>
                        </div>
                        <button type="submit" class="log-btn" >Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Header.php') ?>