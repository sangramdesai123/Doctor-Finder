<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Profile";
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
                        <a href="index.html" class="breadcrumbs__link"><span class="breadcrumbs__title">Home</span></a>
                    </li>

                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__page c-gray">Profile</span>
                    </li>
                </ul>
                <!-- .breadcrumbs -->
            </div>
            <!-- .container -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="settings">
                        <h2 class="settings__header">Howdy, <strong><?php echo $_SESSION['user_name']; ?>!</strong></h2>
                        <div class="setting-group">
                            <h3 class="setting-group__title c-gray">Manage Account</h3>
                            <ul class="setting-container min-list">
                                <li class="setting setting--current">
                                    <i class="fa fa-user setting__icon"></i>
                                    <a href="profile.php" class="setting__link">My Profile</a>
                                </li>
                            </ul>
                            <!-- .setting-container -->
                        </div>
                        <!-- setting-group -->

                        <div class="setting-group">
                            <ul class="setting-container min-list">
                                <li class="setting">
                                    <i class="fa fa-lock setting__icon"></i>
                                    <a href="change-password.php" class="setting__link">Change Password</a>
                                </li>
                                <li class="setting">
                                    <i class="fa fa-power-off setting__icon"></i>
                                    <a href="#" class="setting__link">Log Out</a>
                                </li>
                            </ul>
                            <!-- .setting-container -->
                        </div>
                        <!-- setting-group -->
                    </div>
                    <!-- .settings -->
                </div>
                <!-- .col -->

                <div class="col-lg-9">
                    <form action="/" method="post">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" id="name" class="form-input form-input--square form-input--border-c-alto bg-wild-sand form-input--large" required value="<?php echo $_SESSION['user_name']; ?>" disabled>
                                </div>
                                <!-- .form-group -->
                                
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-input form-input--square form-input--border-c-alto bg-wild-sand form-input--large" disabled value="">
                                </div>
                                <!-- .form-group -->                                

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-input form-input--square form-input--border-c-alto bg-white form-input--large" required value="john@example.com">
                                </div>
                                <!-- .form-group -->

                                <div class="form-group">
                                    <label for="address">Date of Birth</label>
                                    <input type="text" name="address" id="address" class="form-input form-input--square form-input--border-c-alto bg-white form-input--large">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col -->

                            <div class="offset-1 col-lg-4">
                                <div class="form-group">
                                    <img src="assets/images/doctorusers/10wjs03JJv8.jpg" alt="" class="profile-image">
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-lg-12">
                                <div class="form-group--submit">
                                    <button class="button button--square button--primary button--large button--submit" type="submit">
          Save Changes
        </button>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                    </form>
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
    ?>

</body>

</html>