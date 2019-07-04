<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Contact Us";
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
                        <span class="breadcrumbs__page c-gray">Contact Us</span>
                    </li>
                </ul>
                <!-- .breadcrumbs -->
            </div>
            <!-- .container -->
        </div>
        <section class="contact-container">
            <div class="container">
                <h2 class="page-section__title">Get in Touch</h2>
                <p class="c-dove-gray">We're available from Monday to Friday, 07:30-19:00 to take your call</p>

                <div class="contact-list">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="contact t-center">
                                <div class="contact-icon bg-primary">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h3 class="contact-type">Address</h3>
                                <p class="c-dove-gray">K.J.S.C.E., Vidyanagar, Vidya Vihar East, Mumbai, Maharashtra 400077</p>
                            </div>
                            <!-- .contact -->
                        </div>
                        <!-- .col -->

                        <div class="col-md-6 col-lg-3">
                            <div class="contact t-center">
                                <div class="contact-icon bg-primary">
                                    <i class="fa fa-mobile"></i>
                                </div>
                                <h3 class="contact-type">Phone</h3>
                                <a href="tel:+841234567890" class="c-dove-gray">(+84) 123 456 7890</a>
                                <a href="tel:+849876543210" class="c-dove-gray">(+84) 987 654 3210</a>
                            </div>
                            <!-- .contact -->
                        </div>
                        <!-- .col -->

                        <div class="col-md-6 col-lg-3">
                            <div class="contact t-center">
                                <div class="contact-icon bg-primary">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <h3 class="contact-type">Mail</h3>
                                <a href="mailto:listiry@listiry.com" class="c-dove-gray">info@doctorstranger.com</a>
                                <a href="mailto:support@doctorstranger.com" class="c-dove-gray">support@doctorstranger.com</a>
                            </div>
                            <!-- .contact -->
                        </div>
                        <!-- .col -->

                        <div class="col-md-6 col-lg-3">
                            <div class="contact t-center">
                                <div class="contact-icon bg-primary">
                                    <i class="fa fa-share-alt"></i>
                                </div>
                                <h3 class="contact-type">Social</h3>
                                <ul class="min-list inline-list social-list">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .contact -->
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .contact-list -->

                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-section__title">Our Location</h2>
                        <div class="contact-map-container">
                            <div id="contact-map" class="map"></div>
                        </div>
                        <!-- .contact-map-container -->
                    </div>
                    <!-- .col -->

                    <div class="col-md-6">
                        <h2 class="page-section__title">Contact Us</h2>
                        <form action="/" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Your full name *</label>
                                        <input type="text" id="name" name="name" class="form-input form-input--large form-input--border-c-alto" placeholder="John Doe" required>
                                    </div>
                                    <!-- .form-group -->
                                </div>
                                <!-- .col -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Your email *</label>
                                        <input type="email" id="email" name="email" class="form-input form-input--large form-input--border-c-alto" placeholder="johndoe@gmail.com" required>
                                    </div>
                                    <!-- .form-group -->
                                </div>
                                <!-- .col -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">Your message</label>
                                        <textarea name="message" id="message" rows="10" class="form-input form-input--large form-input--border-c-alto" placeholder="Your comment"></textarea>
                                    </div>
                                    <!-- .form-group -->
                                </div>
                                <!-- .col -->

                                <div class="col-md-12">
                                    <div class="form-group--submit">
                                        <button class="button button--large button--square button--primary" type="submit">Send Message</button>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- .row -->
                        </form>
                    </div>
                    <!-- .col -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- .contact -->
    </div>
    <!-- .page-content -->
    <?php
        require_once("includes/footer.php");
        require_once("includes/scripts.php");
    ?>

</body>

</html>