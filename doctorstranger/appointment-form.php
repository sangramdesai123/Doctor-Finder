<?php
    require_once("includes/init.php");
    require_once("classes/Doctor.php");
    $doctor = new Doctor();
    if(isset($_GET['id'])){
        $doc_count = $doctor->getDoctorCount();
        if($doc_count >= $_GET['id']){
            $doctor_id = $_GET['id'];
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
        }else{
            Functions::redirect("404.php");
        }
    }else{
        Functions::redirect("404.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Appointment Form";
        require_once("includes/head.php");
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
                        <a href="single-listing.php" class="breadcrumbs__link"><span class="breadcrumbs__title">Doctor Information</span></a>
                    </li>
                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__page c-gray">Appointment</span>
                    </li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .container -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-login js-login-form">
                        <div class="form-login__block js-form-block is-selected">
                               <form action="" method="post" id="appointment-form" enctype="multipart/form-data">
                                <div class="form-container">
                                    <h3 class="form-title t-center">Appointment Details</h3>
                                    <!-- .form-social -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="patient_name">Patient Name</label>
                                                <input type="text" name="patient_name" id="patient_name" class="form-input form-input--pill form-input--border-c-gallery" required placeholder="John Doe">
                                            </div>
                                            <!-- .form-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="text" name="date" id="date" class="form-input form-input--pill form-input--border-c-gallery" data-toggle="datepicker" required placeholder="20-09-2018">
                                            </div>
                                            <!-- .form-group -->                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="time">Time Slot</label>
                                                <select name="time_slot" id="time_slot" class="chosen-select js-time-slot" data-placeholder="Choose time slot..."></select>
                                            </div>
                                            <!-- .form-group -->
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="problem">Say About Your Problem</label>
                                                <textarea rows="5" cols="10" name="problem" id="problem" class="form-input form-input--pill form-input--border-c-gallery" required placeholder="About you Problem"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="form-label">Upload Your Medical Reports</span>
                                                <div class="dropzone" id="reports">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="manage" value="appointment">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">

                                    <div class="form-group--submit t-center">
                                        <input id="submit-appointment" name="submit-appointment" class="button button--primary button--pill button--large button--submit" type="submit" value="Submit">
                                    </div>
                                </div>
                                <!-- .form-container -->
                            </form>
                            <!-- .appointment -->
                        </div>
                        <!-- .form-login__block -->
                    </div>
                    <!-- .form-login -->
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->        
    </div>
    <!-- .page-content -->
    
    <?php
        require_once("includes/footer.php");
        require_once("includes/scripts.php");
        require_once("includes/dropzone-scripts.php");
    ?>
    <script>
        var options = "";
        options += "<option value='NA'>NA</option>";
        $('.chosen-select').chosen({
          width: '100%'
        });
        $("#date").change(function(e){
            var date = $("#date");
            var date_str = date.datepicker('getDate', true);
            var day = date.datepicker('getDayName');
            var doc_id = <?php echo $doctor_id; ?>;
            console.log(doc_id + " " + day + " " + date_str);
            $.ajax({
                type: 'POST',
                url: 'includes/process-ajax-request.php',
                data: "manage=slot&day="+day+"&doc_id="+doc_id+"&date="+date_str,
            }).done(function(response) {
                console.log(response);
            });
        });
    </script>

</body>
</html>