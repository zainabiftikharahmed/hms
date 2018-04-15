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
                <form action="AddRoom" method="post">
                    <div style="top:10%;" class="login-form">
                        <h1>Add Room</h1><br>
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
                            <textarea rows="2" cols="25" type="text" name="Description" class="form-control" placeholder="Description" id="Description"></textarea>
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="form-group ">
                            <input type="number" name="Price" class="form-control" placeholder="Price" id="Price">
                            <i class="fa fa-money"></i>
                        </div>
                        <button type="submit" class="log-btn" >Add Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php') ?>