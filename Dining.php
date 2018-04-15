<!--<% if(session.getAttribute("Type")==null){ %>
   <jsp:include page="Header.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <jsp:include page="ManagerHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==2){%>
   <jsp:include page="UserHeader.jsp" />
<%}%> -->

<?php require ('Header.php') ?>
<section id="main">
    <div id="content" class="primary">
        <div class="full-width-container">
            <div class="full-image-hover">
                <img src="css/img/FullWidth/Dining.jpg" alt="" />
            </div>
        </div>
        <div id="secondary-nav">
            <div class="container"></div>
        </div>
        <div id="content-wrap">
            <div class="container">
                <div class="intro col col-2-3">
                    <h2>Dine & Drink</h2>
                    <h1>It's all about Key West fine dining and cravings at our waterfront restaurant - Hot Tin Roof.</h1>
                    <p>Satisfying the ones you have, and creating sensory experiences that are totally unexpected. Meet the restaurants of the Ocean Key Resort &amp; Spa. Each and every one brought to you with signature Key West flair.</p>
                </div>
                <div class="col-wrap">
                    <div class="col box-type-1">
                        <div class="image-container">
                            <img src="css/img/LearnMore/HotTinRoofRestaurant.jpg" />
                        </div>
                        <div class="content-wrap">
                            <h3>Hot Tin Roof Restaurant</h3>
                            <p>Casual elegance and one of the best waterfront dining experiences overlooking Key West Harbor.</p>
                        </div>
                    </div>
                    <div class="col box-type-1">
                        <div class="image-container">
                            <img src="css/img/LearnMore/Liquid.jpg"/>
                        </div>
                        <div class="content-wrap">
                            <h3>LIQUID</h3>
                            <p>Our Key West pool bar, LIQUID, is the ultimate in poolside pampering.</p>
                        </div>
                    </div>
                    <div class="col box-type-1">
                        <div class="image-container">
                            <img src="css/img/LearnMore/SunsetPier.jpg" />
                        </div>
                        <div class="content-wrap">
                            <h3>Sunset Pier</h3>
                            <p>Sunset Pier is the best place in Key West, Florida to enjoy gulf side waterfront dining morning, noon and night. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>