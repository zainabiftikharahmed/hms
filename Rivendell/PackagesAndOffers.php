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
                <img src="css/img/FullWidth/PackagesAndOffers.jpg" alt="" />
            </div>
        </div>
        <div id="secondary-nav">
            <div class="container"></div>
        </div>
        <div id="content-wrap">
            <div class="container">
                <div class="intro col col-2-3">
                    <h2>Packages & Offers</h2>
                    <h1>Choose from a variety of our best hotel deals and vacation packages below.</h1>
                </div>
                <div class="col-wrap">
                    <div class="col box-type-1 room">
                        <img src="css/img/LearnMore/LiquidParadise.jpg" />
                        <div class="content-wrap has-button">
                            <h3>LIQUID Paradise</h3>
                            <p>The most desirable view on all of Key West... bright and vibrant fabrics and furnishings, genuinely friendly service, and culinary delights to match the energy. Oh yes, and Liquid. Lots of LIQUID. Exclusively for Ocean Key Guests. The LIQUID Paradise Package applies to all ocean view and ocean front rooms and suites.<br /><br />
                                <strong>Package includes:</strong>
                            <ul><li>$50 per day resort credit to be used at LIQUID.</li></ul><br />
                            <em>*Package applies to all ocean view and ocean front rooms and suites. This includes a $50 per day, per room resort credit to be used at LIQUID. Subject to availability.<br /></em>
                            </p>
                            <a class="btnCheckRates" href="Bookings.php"><strong>Check Rates ></strong></a>
                        </div>
                    </div>
                    <div class="col box-type-1 room">
                        <img src="css/img/LearnMore/SuiteSavingsInParadise.jpg" />
                        <div class="content-wrap has-button">
                            <h3>Suite Savings in Paradise</h3>
                            <p>Suite Escape - Save 10% On our premier suites at Key West's top luxury hotel!<br /><br />
                                <strong>Package includes:</strong>
                            <ul><li>Save 10% On our premier suites</li></ul><br />
                            <em>*Subject to availability. Limited time offer.<br /></em>
                            </p>
                            <a class="btnCheckRates" href="Bookings.php"><strong>Check Rates ></strong></a>
                        </div>
                    </div>
                    <div class="col box-type-1 room">
                        <img src="css/img/LearnMore/ReturnToParadisePackage.jpg" />
                        <div class="content-wrap has-button">
                            <h3>Return to Paradise Package</h3>
                            <p>Our most popular package includes daily waterfront breakfast for 2 at Hot Tin Roof, our four diamond award winning Latin Bistro which offers Cuban influenced menu selections where French techniques are highlighted with the freshest local seafood and seasonal produce. Or if you prefer dine on your private balcony. Accommodations offer unparalleled views of the island or ocean. Relax poolside sipping away on your complimentary cocktail from Liquid Lounge or listen to live entertainment at the world famous Sunset Pier.<br /><br />
                                <strong>Package includes: </strong>
                            <ul>
                                <li>Deluxe accommodations</li>
                                <li>Breakfast for two in Hot Tin Roof</li>
                                <li>Two complimentary cocktails per person, per day at Liquid Lounge or Sunset Pier</li>
                            </ul>
                            <em><br />*Package is subject to availability and blackout dates may apply.</em>
                            </p>
                            <a class="btnCheckRates" href="Bookings.php"><strong>Check Rates ></strong></a>
                        </div>
                    </div>
                </div>
                <div class="col-wrap">
                    <div class="col box-type-1 room">
                        <img src="css/img/LearnMore/FloridaResidentRate.jpg" />
                        <div class="content-wrap has-button">
                            <h3>Florida Resident Rate</h3>
                            <p>Florida Residents Rates are subject to availability and up to 20% off of regular rates. Must present a valid Florida Drivers ID at check-in.<br /><br />
                                <strong>Package includes:</strong>
                            <ul><li>Discounts on room and suite accommodations</li></ul>
                            <em><br />*Rates are valid for Florida residents only. Proof of residency is required at the time of check-in. Acceptable forms include Florida Driver's License or Florida issued state identification card.</em>
                            </p>
                            <a class="btnCheckRates" href="Bookings.php"><strong>Check Rates ></strong></a>
                        </div>
                    </div>
                    <div class="col box-type-1 room">
                        <img src="css/img/LearnMore/HoneymoonInParadise.jpg" />
                        <div class="content-wrap has-button">
                            <h3>Honeymoon In Paradise</h3>
                            <p>There is no better way to start your life together than at Ocean Key Resort &amp; Spa. The #1 luxury resort on Key West also boasts great fun and the friendliest staff. Our guests come back time and again. Choose from our premiere rooms and suites and enjoy the amenities below.<br />
                                <strong><br />Package includes:</strong>
                            <ul>
                                <li>Luxury accommodations</li>
                                <li>A welcome bottle of chilled champagne</li>
                                <li>Daily waterfront breakfast for two </li>
                                <li>A dinner for two at Hot Tin Roof</li>
                                <li>A 50 minute couples massage</li>
                            </ul><br />
                            <em>*Subject to availability. 3 night minimum stay required.</em>
                            </p>

                            <a class="btnCheckRates" href="Bookings.php"><strong>Check Rates ></strong></a>

                        </div>
                    </div>
                    <div class="col box-type-1 room">
                        <img src="css/img/LearnMore/NobleAdventures.jpg" />
                        <div class="content-wrap has-button">
                            <h3>Noble Adventures</h3>
                            <p>
                                <strong>Day 1 - A Full Day of Reef Fishing</strong><br />
                                Explore the wrecks and reef off the shores of Key West, practically guaranteeing nonstop fishing action. North America&rsquo;s only living coral reef stretches from Miami to the Dry Tortugas. The coral cover provides shelter for thousands of species. Your captain will have years of experience, and will know where to anchor to see the species you want. Don&rsquo;t be surprised to have a Shark show up. Jacks, Cobia and Mackerel frequent the same columns as well, making your catch of the day an impressive mix of species. <br /><br />
                                <strong>Day 2 - A Seaplane Trip to the Dry Tortugas</strong><br />
                                This one-of-a-kind experience is not to be missed for an adventurous soul. 70 miles west off Key West lay the Dry Tortugas National Park. The park is renowned for its marine life, pirate legends and sheer unspoiled beauty. It is dominated by its central feature, the majestic Fort Jefferson, the largest brick building in the western hemisphere. Step back in time and explore the history that is Fort Jefferson. Sunbathe on a remote white sand beach or snorkel the living reef in the warm crystal clear waters. <br /><br />
                                <strong>Day 3 - Jet Ski Tour <br /></strong>
                                Enjoy a one and a half hour Jet Ski Tour - including a &ldquo;swim and play&rdquo; stop at the half way point on a pristine sandbar before wave-hopping along the Atlantic shoreline, Southernmost Point and beaches of Key West back to the dock.<br /><br />
                                <strong>Package includes:</strong>
                            <ul>
                                <li>Luxury accommodations </li>
                                <li>Daily waterfront breakfast for two </li>
                                <li>Dinner for two, one evening at Hot Tin Roof </li>
                            </ul><br />
                            <em>*A 3-night minimum stay is required. All activities are for two guests. Subject to availability.</em>
                            </p>
                            <a class="btnCheckRates" href="Bookings.php"><strong>Check Rates ></strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require ('Footer.php') ?>