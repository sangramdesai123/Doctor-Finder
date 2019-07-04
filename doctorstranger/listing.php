<?php
    if(!isset($_GET['specialityname']) || !isset($_GET['cityname']) || $_GET['specialityname'] == "" || $_GET['cityname'] == ""){
        header('Location: 404.php');
    }else{
        $speciality = $_GET['specialityname'];
        $city = $_GET['cityname'];
        require_once("classes/Listing.php");
        require_once("classes/Doctor.php");
        $listing = new Listing();
        $doctor = new Doctor();
        $data = $listing->getLisitings($speciality, $city);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Search Results";
        require_once("includes/head.php");
    ?>
</head>

<body>
    <?php
        require_once("includes/navbar.php");
    ?>
        <div class="d-xl-flex">
            <div class="order-xl-1 listing-column listing-column--xl-50 listing-column--map js-map-container">
                <div id="listing-map" class="map"></div>
                <ul class="min-list map-controls">
                    <li class="map-control reset">
                        <button class="button map-control-button"><i class="fa fa-undo"></i></button>
                    </li>
                    <li class="map-control toggle-fullscreen">
                        <button class="button map-control-button"><i class="fa fa-expand"></i></button>
                    </li>
                </ul>
                <!-- .map-control -->
            </div>
            <!-- .listing-column -->

            <div class="order-xl-0 listing-column listing-column--xl-50 listing-column--content">
                <?php
                    if(mysqli_num_rows($data['resultset']) > 0){
                ?>
                <div class="c-gray mb-3">
                    Suggestion for <span class="c-primary keyword"><?php echo $speciality; ?></span> near <span class="c-primary keyword"><?php echo $city; ?></span>
                </div>

                <!-- .listing-filter-container -->
                <div class="d-md-flex flex-md-wrap justify-content-between grid-view">
                    <?php
                        
                        foreach($data['resultset'] as $row){
                            $day = date('l');
                            $flag = false;
                            $today = $doctor->getOpeningClosing($row['doctor_id'], $day);
                            $today_opening = date("H:i", strtotime($today['opening']));
                            $today_closing = date("H:i", strtotime($today['closing']));
                            $current = date('H:i');
                            if($today_opening < $current && $current < $today_closing)
                              $flag = true;
                    ?>
                    <div class="list-view__item">
                        <div class="listing hover-effect">
                            <div class="d-sm-flex align-items-sm-center listing__wrapper">
                                <div class="listing__thumbnail">
                                    <a href="single-listing.php?id=<?php echo $row['doctor_id']; ?>">
                                    <?php
                                        if(!empty($user_image)){
                                    ?>
                                    <img src="assets/images/doctorusers/<?php echo $row['user_image']; ?>" alt="Doctor">
                                    <?php
                                        }else{
                                    ?>
                                    <img src="assets/images/avatars/avatar.svg" alt="Doctor-image" height="360px" width="360px">
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($flag){
                                    ?>
                                    <span class="label label--secondary">Open</span>
                                    <?php
                                        }else{
                                    ?>
                                    <span class="label label--tertiary">Closed</span>
                                    <?php
                                        }
                                    ?>                                    
                                  </a>
                                </div>
                                <!-- .listing__thumbnail -->
                                <div class="d-flex justify-content-between align-items-center listing__detail">
                                    <div class="listing__detail-left">
                                        <p class="listing__category t-small">
                                            <span class="c-dove-gray"><?php echo $speciality; ?></span>
                                            <span class="listing__price">
                                                <i class="fa fa-rupee c-dove-gray"></i>
                                                <?php echo $row['fees']; ?>
                                            </span>
                                        </p>
                                        <h3 class="listing__title">
                                            <a href="single-listing.php?id=<?php echo $row['doctor_id']; ?>">Dr. <?php echo $row['user_name']; ?></a>
                                        </h3>
                                        <p class="listing__location c-dusty-gray no-b-margin">
                                            <i class="fa fa-map-marker"></i> <?php echo $row['clinic_address']; ?>
                                        </p>
                                    </div>
                                </div>
                                <!-- .listing__detail -->
                            </div>
                            <!-- .listing__wrapper -->
                        </div>
                        <!-- .listing -->
                    </div>
                    <!-- .list-view__item -->                    
                    <?php
                        }
                    ?>
                </div>
                <!-- .d-md-flex -->

                <div class="t-center load-more">
                    <button class="button button--primary button--medium button--pill">Load More</button>
                </div>
                <?php
                    }else{
                ?>
                    <div class="c-gray t-center">
                        No Suggestion's found for <span class="c-primary keyword"><?php echo $speciality; ?></span> near <span class="c-primary keyword"><?php echo $city; ?></span>
                    </div>                
                <?php
                    }
                ?>
            </div>
            <!-- .listing-column -->
        </div>
        <!-- d-flex -->
        <?php
        require_once("includes/footer.php");
        require_once("includes/scripts.php");
        require_once("includes/maps.php");
    ?>

</body>

</html>