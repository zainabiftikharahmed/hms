<!--<%@page import="java.util.ArrayList"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<% if(session.getAttribute("Type")==null){ %> 
   <jsp:forward page = "Error.jsp" />
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
                <form action="ApproveRoom" method="post">
                    <div style="width: 1000px" class="login-form">
                        <h1>SEARCH ROOM RESULTS</h1><br>
                        <div class="form-group ">
                            <table>
                                <tbody>
                                <tr>
                                    <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">ROOM ID</th>
                                    <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">DESCRIPTION</th>
                                    <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">PRICE</th>
                                    <th style="height:15px; width:250px; background:#2c9cb6; color:white" class="form-control">BOOK ROOM</th>
                                </tr>
                                <tr>
                                    <c:forEach items="${requestScope.S_Rooms}" var="SRoom">
                                        <th style="width:250px" class="form-control"><c:out value="${SRoom.GetRoomID()}"></c:out></th>
                                        <th style="width:250px" class="form-control"><c:out value="${SRoom.GetDescription()}"></c:out></th>
                                        <th style="width:250px" class="form-control"><c:out value="${SRoom.GetPrice()}"></c:out></th>
                                        <th style="width:250px" class="form-control"><th><label><input type="checkbox" name="Approve" value="${SRoom.GetRoomID()}"></label></th>
                                </tr>
                                </c:forEach>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="log-btn" >Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>
                                    

                        

