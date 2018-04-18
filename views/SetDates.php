<!--<% if(session.getAttribute("Type")==null){ %>
   <jsp:forward page = "Error.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <jsp:include page="ManagerHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==2){%>
   <jsp:include page="UserHeader.jsp" />
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
                <form action="BookRoom" method="post">
                    <div class="login-form">
                        <h1>Select Dates</h1><br>
                        <div class="form-group ">
                            <input type="number" name="RoomID" class="form-control" placeholder="RoomID" id="RoomID" value="${requestScope.SelectedRoomForBooking.GetRoomID()}" readonly>
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="form-group ">
                            <input type="text" name="CheckInDate" class="form-control" placeholder="Check-In Date" id="CheckInDate" readonly>
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" name="CheckOutDate" class="form-control" placeholder="Check-Out Date" id="CheckOutDate" readonly>
                            <i class="fa fa-calendar"></i>
                        </div>
                        <button type="submit" class="log-btn">Book Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>