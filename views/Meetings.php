<!--<% if(session.getAttribute("Type")==null){ %>
   <jsp:include page="Header.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <jsp:include page="ManagerHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==2){%>
   <jsp:include page="UserHeader.jsp" />
<%}%>-->
<?php require ('Header.php') ?>
<section id="main">
</section>
<?php require ('Footer.php') ?>