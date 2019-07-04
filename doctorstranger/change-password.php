<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Change Password";
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
                        <a href="index.html" class="breadcrumbs__link"><span class="breadcrumbs__title">Home</span></a>
                    </li>

                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__page c-gray">Change Password</span>
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
                        <h2 class="settings__header">Howdy, <strong>John!</strong></h2>
                        <div class="setting-group">
                            <h3 class="setting-group__title c-gray">Manage Account</h3>
                            <ul class="setting-container min-list">
                                <li class="setting">
                                    <i class="fa fa-user setting__icon"></i>
                                    <a href="profile.php" class="setting__link">My Profile</a>
                                </li>
                            </ul>
                            <!-- .setting-container -->
                        </div>
                        <!-- setting-group -->

                        <div class="setting-group">
                            <ul class="setting-container min-list">
                                <li class="setting setting--current">
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

                <div class="col-lg-4 offset-lg-2">
                    <form action="/" method="post">
                        <div class="form-container">
                            <div class="form-group">
                                <label for="current-password">Current password *</label>
                                <input type="password" name="current-password" id="current-password" class="form-input form-input--pill form-input--border-c-gallery" required>
                            </div>
                            <!-- .form-group -->

                            <div class="form-group">
                                <label for="new-password">New password *</label>
                                <input type="password" name="new-password" id="new-password" class="form-input form-input--pill form-input--border-c-gallery" required>
                            </div>
                            <!-- .form-group -->

                            <div class="form-group">
                                <label for="confirm-password">Confirm new password *</label>
                                <input type="password" name="confirm-password" id="confirm-password" class="form-input form-input--pill form-input--border-c-gallery" required>
                            </div>
                            <!-- .form-group -->

                            <div class="form-group--submit">
                                <button class="button button--primary button--pill button--large button--block button--submit" type="submit">Change Password</button>
                            </div>
                        </div>
                        <!-- .form-container -->
                    </form>
                    <!-- .form -->
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