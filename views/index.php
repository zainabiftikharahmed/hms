<!--<% if(session.getAttribute("Type")==null){ %>
   <jsp:include page="Header.jsp" />
<%}else if((Integer)session.getAttribute("Type")==0){%>
   <jsp:include page="AdminHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==1){%>
   <jsp:include page="ManagerHeader.jsp" />
<%}else if((Integer)session.getAttribute("Type")==2){%>
   <jsp:include page="UserHeader.jsp" />
<%}else{%>
   <jsp:include page="Header.jsp" />
<%}%> -->

<?php require ('Header.php') ?>
<div class="full-width-container">
    <div class="slick-container">
        <div class="slick-slider"></div>
    </div>
</div>
<section id="main">
    <div id="content" class="">
        <div id="content-wrap">
            <div class="container">
                <div class="col col-2-3 intro">
                    <h1>
                        Far from conventional life lies one of the best Resorts -
                        the notoriously playful and nerdy CODE-IT Resort & Spa.
                    </h1>
                    <p>
                        Code-It Resort & Spa, is a top luxury resort, has the unique distinction
                        of being able to claiming Milad Street as its location. Our Key West resort
                        is home to the highly acclaimed Hot Tin Roof restaurant and the world class Spa.
                        The iconic Sunset Pier sits atop turquoise water and offers lively entertainment, stunning
                        views and festive fare. Throughout the years, artists, authors, and creative characters of all kinds have flocked to
                        this tropical locale. Wonderfully diverse, positively eclectic, visitors and residents all
                        thrive in this simple, sundrenched neighborhood. Where historic Milad Street begins,
                        lies the old town experience that is Code-It Resort & Spa, a dream escape from FAST-NU,
                        with views that inspire and energize.
                    </p>
                </div>
            </div>
            <div class="container">
                <section id="special-offers">
                    <div class="col box-type-1">
                        <div class="image-container">
                            <a href="PackagesAndOffers.php">
                                <div class="hover-fade"><span class="learn-more">Learn More</span></div>
                                <img src="css/img/LearnMore/LiquidParadise.jpg" alt="" />
                            </a>
                        </div>
                        <div class="content-wrap">
                            <h3>LIQUID Paradise</h3>
                            <p>Code It Resort welcomes LIQUID Pool - Bar - Lounge to its waterfront location in Milad Street.</p>
                        </div>
                    </div>
                    <div class="col box-type-1">
                        <div class="image-container">
                            <a href="PackagesAndOffers.php">
                                <div class="hover-fade"><span class="learn-more">Learn More</span></div>
                                <img src="css/img/LearnMore/SuiteSavingsInParadise.jpg" alt="" />
                            </a>
                        </div>
                        <div class="content-wrap">
                            <h3>Suite Savings in Paradise</h3>
                            <p>Save 10% On our premier suites</p>
                        </div>
                    </div>
                    <div class="col box-type-1">
                        <div class="image-container">
                            <a href="PackagesAndOffers.php">
                                <div class="hover-fade"><span class="learn-more">Learn More</span></div>
                                <img src="css/img/LearnMore/ReturnToParadisePackage.jpg" alt="" />
                            </a>
                        </div>
                        <div class="content-wrap">
                            <h3>Return to Paradise Package</h3>
                            <p>Our most popular package includes deluxe accommodations and breakfast for two...</p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="full-width-container">
                <div class="full-image-hover">
                    <div class="hover-fade"></div>
                    <img src="css/img/Adventure.jpg" alt="" />
                    <div class="content-wrap">
                        <div class="container" id="footer-promo-text">
                            <span>Find your next adventure here!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>