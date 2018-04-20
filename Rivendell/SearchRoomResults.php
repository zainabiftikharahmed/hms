<!--<%@page import="java.util.ArrayList"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>-->
<?php
session_start();
if(!isset($_SESSION["UserName"])) {
    header("location:Error.php");
}
elseif ($_SESSION(['UserRole'] == 0)) {
    require_once ('UserHeader.php');
}
elseif ($_SESSION(['UserRole'] == 1)) {
    require_once('AdminHeader.php');
}
?>


<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="../Controllers/Room.php" method="post">
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
                                        <th style="width:250px" class="form-control"><label><input type="radio" name="Book" value="${SRoom.GetRoomID()}"></label></th>
                                </tr>
                                </c:forEach>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="log-btn" name="SelectRoom">Select Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>
                        

