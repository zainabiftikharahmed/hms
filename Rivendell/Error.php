<?php
session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        require ("UserHeader.php");
}
else
    require ("Header.php");
?>


<section id="main">
    <div id="content" class="secondary">
        <div class="full-width-container">
            <div class="full-image-hover">
                <img src="css/img/FullWidth/Error.jpg" alt="" />
            </div>
        </div>
        <div id="secondary-nav">
            <div class="container"></div>
        </div>
        <div id="content-wrap">
            <div class="container">
                <div class="intro col col-2-3">
                    <h2>Oops. We cannot find that page.</h2>
                    <p><strong>The page you are looking for has either moved or no longer exists.</strong></p>
                    <p>The resource you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require ('Footer.php') ?>