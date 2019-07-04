<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "View Appointments";
        require_once("includes/head.php");
        require_once("includes/init.php");
        if(!Session::isSessionStart()){
            Session::startSession();
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            }else{
                Functions::redirect("login.php");
            }
        }else{
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            }else{
                Functions::redirect("login.php");
            }            
        }
        require_once("classes/Appointments.php");
        $appointment = new Appointments();
        $result = $appointment->viewAppointments($user_id);
    ?>
</head>

<body>
    <?php
        require_once("includes/navbar.php");
    ?>
    <div class="page-content">
        <div class="breadcrumbs-container">
            <div class="container">
                <ul class="breadcrumbs min-list inline-list">
                    <li class="breadcrumbs__item">
                        <a href="index.php" class="breadcrumbs__link"><span class="breadcrumbs__title">Home</span></a>
                    </li>

                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__page c-gray">View Appointments</span>
                    </li>
                </ul>
                <!-- .breadcrumbs -->
            </div>
            <!-- .container -->
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="listing-table">
                    <tr class="listing-row c-white bg-primary">
                        <th class="t-center">Appointments</th>
                        <th class="t-center">Date - Time</th>
                        <th class="t-center">Actions</th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result) > 0){
                            foreach($result as $row){
                    ?>
                    <!-- .listing-row -->
                    <tr class="listing-row">
                        <td class="listing listing-cell">
                            <div class="listing__wrapper">
                                <div class="listing__detail ml-auto mr-auto">
                                    <h3 class="listing__title">
                                        <a href="single-listing.php"><?php echo $row['user_name']; ?></a>
                                    </h3>
                                    <p class="c-dove-gray">
                                        For &ndash; <?php echo $row['patient_name']; ?>
                                    </p>
                                    <?php
                                        switch ($row['status']) {
                                            case "1":
                                    ?>
                                    <p class="mt-0 text-success">Status &ndash; Accepted</p>
                                    <?php
                                                break;
                                            case "2":
                                    ?>
                                    <p class="mt-0 text-danger">Status &ndash; Rejected</p>                                    
                                    <?php
                                                break;
                                            case "3":
                                    ?>
                                    <p class="mt-0 text-warning">Status &ndash; Pending</p>                                    
                                    <?php
                                                break;
                                        }                                
                                    ?>
                                </div>
                                <!-- .listing__detail -->
                            </div>
                        </td>
                        <td class="t-center"><?php echo date("d F, Y", strtotime($row['date'])); ?> at <?php echo date("h:i A", strtotime($row['time'])); ?></td>
                        <td class="listing-action t-center">
                            <ul class="min-list">
                                <li>
                                    <button class="action remove" type="button" data-id="<?php echo $row['appointment_id']; ?>"><i class="fa fa-trash"></i> Remove</button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- .listing-row -->
                    <?php
                            }
                        }
                    ?>
                </table>
                    <!-- .listing-table -->
                </div>
            </div>
        </div>
        
    </div>
    <!-- .page-content -->
    <?php
        require_once("includes/footer.php");
        require_once("includes/scripts.php");
    ?>
    <script>
        $('.remove').on("click", function(){
            var app_id = $(this).data("id");
            $.ajax({
                type: 'POST',
                url: 'includes/process-ajax-request.php',
                data: "manage=delete&id="+app_id,
            }).done(function(response){
                location.reload();
            });
        });
        $(window).load(function() {
            if (window.location.href.indexOf('reload')==-1) {
                 window.location.replace(window.location.href+'?reload');
                 location.reload();
            }
        });
    </script>

</body>

</html>