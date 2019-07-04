<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Index";
        require_once("includes/head.php");
    ?>
</head>

<body>
    <?php
        require_once("includes/navbar.php");
    ?>
    <section class="page-banner page-banner--layout-1 parallax">
        <div class="container">
            <div class="page-banner__container animated zoomIn">
                <div class="page-banner__textcontent t-center">
                    <h2 class="page-banner__title c-white">Your home for health</h2>
                    <p class="page-banner__subtitle c-white">Find the best doctors and book an appointment with us today!</p>
                </div>
                <!-- .page-banner__textcontent -->
               
                <div class="main-search-container">
                    <form class="main-search main-search--layout-1 bg-white" action="listing.php" method="get">
                        <div class="main-search__group main-search__group--primary">
                            <label for="main-search-name" class="c-primary"><i class="fa fa-id-card"></i> Specialization</label>
                            <div class="dropmenu-search" id="speciality">
                                <input type="text" name="specialityname" id="specialityname" class="form-input form-input--pill form-input--border-c-gallery typeahead" placeholder="Enter a speciality">
                            </div>
                        </div>
                        <!-- .main-search__group -->

                        <div class="main-search__group main-search__group--secondary">
                            <label for="main-search-location" class="c-primary"><i class="fa fa-location-arrow"></i> Locate</label>
                            <div class="dropmenu-search" id="cities">
                                <input type="text" name="cityname" id="cityname" class="form-input form-input--pill form-input--border-c-gallery typeahead" placeholder="Enter a city">
                            </div>
                        </div>
                        <a class="button button--detect mr-2 button--pill" onclick="getLocation()"><i class="fa fa-crosshairs fa-lg"></i></a>

                        <!-- .main-search__group -->
                        <div class="main-search__group main-search__group--tertiary">
                            <button type="submit" class="button button--medium button--pill button--primary">
							<i class="fa fa-search"></i> Search
						</button>
                        </div>
                    </form>
                </div>
                <!-- .main-search-container -->
            </div>
            <!-- .page-banner__container -->
        </div>
        <!-- .container -->
    </section>
    <!-- .page-banner -->

    <section class="category-container page-section bg-wild-sand category--layout-1">
        <div class="container">
            <h2 class="page-section__title t-center">Our Services</h2>
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="category hover-effect t-center">
                        <a href="#">
                            <div class="category__image">
                                <img src="assets/images/locate.svg" alt="Search">
                            </div>
                            <h3 class="category__title">Search for Doctors Online</h3>
                        </a>
                    </div>
                </div>
                <!-- .search-col -->

                <div class="col-6 col-md-3">
                    <div class="category hover-effect t-center">
                        <a href="#">
                            <div class="category__image">
                                <img src="assets/images/doctor.svg" alt="Appointment">
                            </div>
                            <h3 class="category__title">Book an Appointment Today</h3>
                        </a>
                    </div>
                </div>
                <!-- .appointment-col -->

                <div class="col-6 col-md-3">
                    <div class="category hover-effect t-center">
                        <a href="#">
                            <div class="category__image">
                                <img src="assets/images/medicine.svg" alt="Medicine">
                            </div>
                            <h3 class="category__title">Ensure your Medicine</h3>
                        </a>
                    </div>
                </div>
                <!-- .medicine-col -->

                <div class="col-6 col-md-3">
                    <div class="category hover-effect t-center">
                        <a href="#">
                            <div class="category__image">
                                <img src="assets/images/reports.svg" alt="Reports">
                            </div>
                            <h3 class="category__title">Check your Reports Online</h3>
                        </a>
                    </div>
                </div>
                <!-- .reports-col -->

            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- .category -->

    <section class="news page-section news--layout-1">
        <div class="container">
            <h2 class="page-section__title t-center">Our Milestones</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="post sticky">
                        <div class="post-thumbnail">
                            <a href="single.html">
							<img src="assets/images/uploads/country-network.png" alt="Inter-globe network">
						</a>
                        </div>
                        <!-- .post-thumbnail -->

                        <div class="post-content">
                            <h3 class="post-title text-center">
                                <a href="#">8+ Countries</a>
                            </h3>
                            <p class="post-meta t-small-md text-center c-dusty-gray">
                            Spreading over 8 countries globally and counting.
<!--
                                <span><a href="#" class="c-dusty-gray">Dec 05, 2017</a></span>
                                <span><a href="#" class="c-dusty-gray">Restaurant</a></span>
-->
                            </p>
                        </div>
                        <!-- .post-content -->
                    </div>
                    <!-- .post -->
                </div>
                <!-- .col -->

                <div class="col-md-4">
                    <div class="post">
                        <div class="post-thumbnail">
                            <a href="single.html">
							<img src="assets/images/uploads/patient.jpg" alt="Patient">
						</a>
                        </div>
                        <!-- .post-thumbnail -->

                        <div class="post-content">
                            <h3 class="post-title text-center">
                                <a href="#">1M+ Patients</a>
                            </h3>
                            <p class="post-meta t-small-md text-center c-dusty-gray">Over 1M registered Patients</p>
                        </div>
                        <!-- .post-content -->
                    </div>
                    <!-- .post -->
                </div>
                <!-- .col -->

                <div class="col-md-4">
                    <div class="post">
                        <div class="post-thumbnail">
                            <a href="single.html">
							<img src="assets/images/uploads/doctor-banner.jpg" alt="Doctors">
						</a>
                        </div>
                        <!-- .post-thumbnail -->

                        <div class="post-content">
                            <h3 class="post-title text-center">
                                <a href="#">10,000+ doctors</a>
                            </h3>
                            <p class="post-meta t-small-md text-center c-dusty-gray">Over 10,000 registered doctors</p>
                        </div>
                        <!-- .post-content -->
                    </div>
                    <!-- .post -->
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- .news -->

    <section class="ads ads--layout-1 parallax">
        <div class="t-center ads__container">
            <div class="container">
                <h2 class="ads__title">Find Trustworthy Doctors</h2>
                <p class="ads__subtitle">Doctors are hard to find when emergency occurs. Worry no more we have got your back!</p>
            </div>
        </div>
    </section>
    <!-- .ads -->

    <?php 
        require_once("includes/footer.php"); 
        require_once("includes/scripts.php"); 
    ?>
    <script>
        $(document).ready(function(){
            /***********************Typeahead JS*********************/
            var substringMatcher = function(strs) {
              return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                  if (substrRegex.test(str)) {
                    matches.push(str);
                  }
                });

                cb(matches);
              };
            };

            var speciality = new Array();
            var cities = new Array();

            $.ajax({
                type: 'POST',
                url: 'includes/process-ajax-request.php',
                data: "manage=speciality",
                datatype: 'JSON'
            }).done(function (response) {
                for(i=0;i<response.length; i++){
                    speciality.push(JSON.parse(response)[i]);        
                }
                $('#speciality .typeahead').typeahead({
                  hint: true,
                  highlight: true,
                  minLength: 1
                },
                {
                    name: 'speciality',
                    source: substringMatcher(speciality),
                    templates: {
                        empty: ['<div class="empty-message">','No Suggestions','</div>'].join('\n'),
                    },
                });    
            });

            $.ajax({
                type: 'POST',
                url: 'includes/process-ajax-request.php',
                data: "manage=cities",
                datatype: 'JSON'
            }).done(function (response) {
                for(i=0;i<response.length; i++){
                    cities.push(JSON.parse(response)[i]);        
                }
                $('#cities .typeahead').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'cities',
                    source: substringMatcher(cities),
                    templates: {
                        empty: ['<div class="empty-message">','Unable to find city','</div>'].join('\n'),
                    }
                });        
            });
        });
    </script>

</body>

</html>