<!-- <% if(session.getAttribute("Type")==null){ %>
   <jsp:include page="Header.jsp" />
<%}else{%>
   <jsp:forward page = "Error.jsp" />
<%}%> -->

<?php require ('Header.php'); ?>
<section id="main">
    <div class="full-width-container">
        <div class="full-image-hover">
            <div class="hover-fade"></div>
            <div class="blurimage"><img src="css/img/SignInAndSignUp.jpg" alt="" /></div>
            <div class="content-wrap">
                <form action="SignUp" method="post">
                    <div class="login-form">
                        <h1>Sign Up</h1><br>
                        <div class="form-group ">
                            <input type="text" name="Name" class="form-control" placeholder="Name " id="UserName">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-group ">
                            <input type="email" name="Email" class="form-control" placeholder="Email " id="Email">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="form-group log-status">
                            <input type="password" name="Password" class="form-control" placeholder="Password" id="Passwod" >
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group ">
                            <input type="text" name="Contact" class="form-control" placeholder="Contact " id="UserName">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="form-group ">
                            <input type="checkbox" name="TermsAndConditions"> I agree to <a href="#">Terms and Conditions</a><br>
                        </div>
                        <span class="alert">Invalid Credentials</span>
                        <button type="submit" class="log-btn" >Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php'); ?>
