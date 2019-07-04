<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "404 Error";
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
                        <span class="breadcrumbs__page c-gray">404</span>
                    </li>
                </ul>
                <!-- .breadcrumbs -->
            </div>
            <!-- .container -->
        </div>
        <div class="container">
            <div class="offset-5 col-md-6">
                <img src="assets/images/404.png" alt="" height="350px" class="pl-2">
                <a class="error-404__button button button--square button--medium button--secondary mt-4" href="index.html">Go Back Home</a>                
            </div>
        </div>
    </div>
    <!-- .page-content -->
    <?php
        require_once("includes/footer.php");
        require_once("includes/scripts.php");
    ?>

</body>

</html>