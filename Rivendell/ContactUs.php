<?php
session_start();
if(!isset($_SESSION["UserName"])) {
    require ('Header.php');
}
elseif ($_SESSION(['UserRole'] == 0)) {
    require_once ('UserHeader.php');
}
elseif ($_SESSION(['UserRole'] == 1)) {
    require_once('AdminHeader.php');
}
?>


<section id="main">
    <div id="content" class="secondary">
        <div class="full-width-container">
            <div class="full-image-hover">
                <img src="css/img/FullWidth/ContactUs.jpg" alt="" />
            </div>
        </div>
        <div id="secondary-nav">
            <div class="container"></div>
        </div>
        <div id="content-wrap">
            <div class="container">
                <div class="intro col col-2-3">
                    <h2>Contact Us</h2>
                    <h1>You can only reach our exclusive Resort by seaplane or boat - Half of the fun is getting here.</h1>
                    <p>The friendliest private island resort in the world.</p>
                </div>
                <div class="col-wrap">
                    <div class="col ">
                        <div class="content-wrap ">
                            <h3>Hotel Address</h3>
                            <p><strong>Code It Resort &amp Spa</strong><br/>Milaad St,<br/>Lahore<br />54000<br /></p>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="content-wrap ">
                            <h3>Reservations</h3>
                            <p><strong>Front Desk - </strong>030 44 55 00 66<br /><a href="mailto:l144304@lhr.nu.edu.pk">l144304@lhr.nu.edu.pk</a>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="content-wrap ">
                            <h3>Public Relations</h3>
                            <p><strong>Public Relations:</strong><br />Zainab Iftikhar<br><a href="mailto:l144304@lhr.nu.edu.pk">l144304@lhr.nu.edu.pk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php') ?>