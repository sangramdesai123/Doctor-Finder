<?php
    if(isset($_GET['id']) && $_GET['id']!=0){
        $doctor_id = $_GET['id'];
        require_once("classes/Listing.php");
        $listing = new Listing();
        require_once("classes/Doctor.php");
        $doctor = new Doctor();
        $data = $listing->getSingleListing($doctor_id);
        if(mysqli_num_rows($data['doctor']) == 1){
            extract(mysqli_fetch_assoc($data['doctor']));
        }
    }else{
        header('Location: 404.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Search Information";
        require_once("includes/head.php");
    ?>
</head>

<body>
    <?php
        require_once("includes/navbar.php");
    ?>
<div class="page-content page-content--no-b-bottom">
	<div class="breadcrumbs-container">
		<div class="container">
			<ul class="breadcrumbs min-list inline-list">
				<li class="breadcrumbs__item">
					<a href="index.html" class="breadcrumbs__link">
						<span class="breadcrumbs__title">Home</span>
					</a>
                </li>
				<li class="breadcrumbs__item">
					<span class="breadcrumbs__page c-gray">Single Listing</span>
				</li>
			</ul><!-- .breadcrumbs -->
		</div><!-- .container -->
	</div>
	<section class="single-listing single-listing--layout-1">		
		<div class="listing-main bg-wild-sand">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="listing-section bg-white hover-effect container">
						    <div class="row">
                                <div class="col-lg-4">
                                    <?php
                                        if(!empty($user_image)){
                                    ?>
                                    <img src="assets/images/doctorusers/<?php echo $user_image; ?>" alt="Doctor-1">
                                    <?php
                                        }else{
                                    ?>
                                    <img src="assets/images/avatars/avatar.svg" alt="Doctor-image">
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="col-lg-8 mt-auto mb-auto">
                                    <div class="listing-header__main">
                                        <div class="listing-header__content">
                                            <div class="d-sm-flex align-items-md-center">
                                                <h2 class="listing-header__title">Dr. <?php echo $user_name; ?></h2>
                                                <div class="ml-1">
                                                    <i class="fa fa-check-circle c-secondary"></i>
                                                    <span class="c-dusty-gray">Verified</span>
                                                </div>
                                            </div>

                                            <ul class="min-list listing-header__detail">
                                                <li>
                                                   <span>
                                                        <span class="c-dove-gray">Price: &nbsp;&nbsp;</span>
                                                        <i class="fa fa-rupee c-dove-gray"></i>
                                                        <span class="c-dove-gray"><?php echo $fees; ?></span>
                                                    </span>
                                                </li>
                                            </ul><!-- .listing__header-detail -->
                                            
                                            <p class="listing__category t-small-md">
                                                <span class="c-dove-gray"><?php echo $years_of_practice." Years of Experience"; ?></span>
                                            </p>
                                            
                                        </div><!-- .listing-header__content -->
                                    </div><!-- .listing-header__main -->
                                </div><!--.col-lg-4-->
						    </div>
						</div>
						<div id="about" class="listing-section bg-white hover-effect" data-matching-link="#about-link">
							<div class="listing-section__header">
								<h3 class="listing-section__title">About Dr. <?php echo $user_name; ?></h3>
							</div><!-- .listing-section__header -->

							<div class="c-dove-gray">
								<p><?php echo $about_you; ?></p>
							</div>
							<div class="c-dove-gray">
							    <p class="t-md">Education</p>
                                <ul class="min-list listing-features c-dove-gray">
                                    <?php 
                                        if(mysqli_num_rows($data['doctor_education']) > 0){
                                            while($row = mysqli_fetch_assoc($data['doctor_education'])){
                                                extract($row);
                                    ?>
                                    <li><?php echo $degree_name." &ndash; ".$institute_name." ,".$year_of_passing; ?></li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
							</div>
							<div class="c-dove-gray">
							    <p class="t-md">Specialization</p>
                                <ul class="min-list listing-features c-dove-gray">
                                    <?php 
                                        if(mysqli_num_rows($data['doctor_speciality']) > 0){
                                            while($row = mysqli_fetch_assoc($data['doctor_speciality'])){
                                                extract($row);
                                    ?>
                                    <li><?php echo $speciality_name; ?></li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
							</div>
							<div class="c-dove-gray">
							    <p class="t-md">Experience</p>
                                <ul class="min-list listing-features c-dove-gray">
                                    <?php 
                                        if(mysqli_num_rows($data['doctor_experience']) > 0){
                                            while($row = mysqli_fetch_assoc($data['doctor_experience'])){
                                                extract($row);
                                    ?>
                                    <li><?php echo $start_year." - ".$end_year." ".$worked_as." at ".$worked_at; ?></li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
							</div>
						</div><!-- .listing-section -->
					</div><!-- .col -->

					<div class="col-lg-4">
						<div class="listing-widget bg-white hover-effect">
							<div class="listing-map-container">
								<div id="listing-contact-map" class="map"></div>
							</div><!-- .listing-map-container -->

							<ul class="min-list listing-contact-list">
								<li class="d-flex align-items-center c-silver-charlice listing-contact">
									<i class="fa listing-contact__icon"></i>
									<span class="c-black"><?php echo $clinic_name; ?></span>
								</li>

								<li class="d-flex align-items-center c-silver-charlice listing-contact">
									<i class="fa fa-compass listing-contact__icon"></i>
									<span class="c-black"><?php echo $clinic_address; ?></span>
								</li>

								<li class="d-flex align-items-center c-silver-charlice listing-contact">
									<i class="fa fa-phone listing-contact__icon"></i>
									<a href="tel:<?php echo $clinic_phone; ?>"><?php echo $clinic_phone; ?> </a>
								</li>
							</ul><!-- .listing-contact-list -->
							<a href="appointment-form.php?id=<?php echo $doctor_id; ?>" class="button button--primary button--block button--pill button--large">Book Appointment</a>
						</div><!-- .listing-widget -->

						<div class="listing-widget bg-white hover-effect">
							<h3 class="listing-widget__title">Opening Time</h3>
							<?php
                                $current_day = date('l');
                                $flag = false;
                                $today = $doctor->getOpeningClosing($doctor_id, $current_day);
                                $today_opening = date("H:i", strtotime($today['opening']));
                                $today_closing = date("H:i", strtotime($today['closing']));
                                $current = date('H:i');
                                if($today_opening < $current && $current < $today_closing)
                                  $flag = true;
                            ?>
							<table class="listing-timetable">
							    <?php
                                    for($i=0; $i<7; $i++){
                                        $day = date('l', strtotime("Sunday + $i days"));
                                        $day_time = $doctor->getOpeningClosing($doctor_id, $day);
                                        if($day_time['opening'] != "Closed" || $day_time['closing'] != "Closed"){
                                ?>
								<tr>
									<th><strong><?php echo $day;?></strong></th>
									<td><?php echo date("h:i A", strtotime($today['opening']))." - ".date("h:i A", strtotime($today['closing'])); ?></td>
									<td class="c-secondary">
									<?php
                                        if($day == $current_day){
                                            if($flag){
                                                echo " Open Now";
                                            }else{
                                                echo "Closed";
                                            }
                                        }
                                    ?>
									</td>
								</tr>
								<?php
                                        }else{
                                ?>
								<tr>
									<th><strong><?php echo $day;?></strong></th>
									<td><?php echo "Remains Closed"; ?></td>
									<td class="c-secondary"></td>
								</tr>                                
                                <?php        
                                        }
                                    }
                                ?>
							</table>
						</div><!-- .listing-widget -->

						<div class="listing-widget bg-white hover-effect">
							<h3 class="listing-widget__title">Enquiry</h3>
							<form action="/" method="post">
								<div class="form-group">
									<label for="name">Name *</label>
									<input type="text" name="name" id="name" required class="form-input form-input--large form-input--border-c-gallery">
								</div><!-- .form-group -->

								<div class="form-group">
									<label for="email">Email *</label>
									<input type="email" name="email" id="email" required class="form-input form-input--large form-input--border-c-gallery">
								</div><!-- .form-group -->

								<div class="form-group">
									<label for="message">Message</label>
									<textarea name="message" id="message" rows="8" class="form-input form-input--large form-input--border-c-gallery"></textarea>
								</div><!-- .form-group -->

								<div class="form-group--submit">
									<button class="button button--primary button--large button--pill" type="submit">Send Message</button>
								</div>
							</form>
						</div><!-- .listing-widget -->
					</div><!-- .col -->
				</div><!-- .row -->
			</div>
		</div>
	</section><!-- .single-listing -->
</div><!-- .page-content -->
    <?php
        require_once("includes/footer.php");
        require_once("includes/scripts.php");
        require_once("includes/single-map.php");
    ?>

</body>
</html>
