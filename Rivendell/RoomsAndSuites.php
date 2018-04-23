<?php
session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        require ("UserHeader.php");
}
else
    require ('Header.php');
?>

    <section id="main">
        <div id="content" class="primary">
            <div class="full-width-container">
                <div class="full-image-hover">
                    <img src="css/img/FullWidth/RoomsAndSuites.jpg" alt="" />
                </div>
            </div>
            <div id="secondary-nav">
                <div class="container"></div>
            </div>
            <div id="content-wrap">
                <div class="container">
                    <div class="intro col col-2-3">
                        <h2>Lodging</h2>
                        <h1>View the luxury rooms and suites available at our Code-In hotel.</h1>
                        <p>Island luxury with a twist. Island luxury meets barefoot elegance&nbsp;creating the perfect setting for your best experience. A spacious blend of opulence and Key West flair makes them the most sought-out suites on the island.</p>
                    </div>
                    <div class="col-wrap">
                        <div class="col box-type-1">
                            <div class="image-container">
                                <img src="css/img/LearnMore/Guestrooms.jpg" />
                            </div>
                            <div class="content-wrap">
                                <h3>Guestrooms</h3>
                                <p>Guestrooms feature private balconies with partial ocean views, queen beds and large marble baths with whirlpool tubs.</p>
                            </div>
                        </div>
                        <div class="col box-type-1">
                            <div class="image-container">
                                <img src="css/img/LearnMore/Suites.jpg"/>
                            </div>
                            <div class="content-wrap">
                                <h3>Suites</h3>
                                <p>Not only do our well-appointed suites celebrate the unique essence of Key West, they also work to capture its distinct energy and style.</p>
                            </div>
                        </div>
                        <div class="col box-type-1">
                            <div class="image-container">
                                <img src="css/img/LearnMore/PentHouse.jpg"/>
                            </div>
                            <div class="content-wrap">
                                <h3>Penthouse</h3>
                                <p>There are many reasons to visit Ocean Key Resort &amp; Spa. Let us suggest just a few&hellip;.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require ('Footer.php') ?>