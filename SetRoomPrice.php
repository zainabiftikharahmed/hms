<!--<% if(session.getAttribute("Type")==null){ %>
   <jsp:forward page = "Error.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <jsp:include page="ManagerHeader.jsp" />
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
                    <form action="SetRoomPrice" method="post">
                        <div style="top:10%;" class="login-form">
                            <h1>Room Price</h1><br>
                            <div class="form-group " >
                                <input type="number" name="RoomID" class="form-control" placeholder="Room ID" id="RoomID">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="form-group ">
                                <input type="number" name="Price" class="form-control" placeholder="New Price" id="Price">
                                <i class="fa fa-money"></i>
                            </div>
                            <button type="submit" class="log-btn" >Set Price</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require ('Header.php') ?>