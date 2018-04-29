<?php
session_start();
if (isset($_SESSION["Email"])){
    if ($_SESSION["Role"] == 1)
        require ("AdminHeader.php");
    else
        require ("UserHeader.php");
}
else
    header("location:Error.php");
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
                    <h2>Send Us Your Feedback!</h2>
                    <form action="../Controllers/Review.php" method="post">
                        <div class="form-group ">
                            <select class="form-control" name="Stars" id="Stars" required>
                                <option  selected disabled>Rate Rivendell</option>
                                <option value="★☆☆☆☆">1</option>
                                <option value="★★☆☆☆">2</option>
                                <option value="★★★☆☆">3</option>
                                <option value="★★★★☆">4</option>
                                <option value="★★★★★">5</option>
                            </select>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="form-group ">
                            <textarea type="text" name="ReviewSubmitted" class="form-control" placeholder="Say Something Nice " id="Review" required>
                        </textarea>
                            <i class="fa fa-envelope"></i>
                        </div>
                        <button type="submit" name="AddReview" class="log-btn">Add Review</button>
                    </form>
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