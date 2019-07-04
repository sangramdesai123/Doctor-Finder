<?php
	$flag =0;
	ob_start();
    require_once ("includes/init.php");
	include_once ("classes/User.php");
	include_once ("classes/Doctor.php");
	include_once ("classes/Functions.php");
	if(isset($_POST['login'])){
        Session::startSession();
		extract($_POST);
		$obj = new User();
		if( $obj->processLogin( $user_number, $user_password)){
			if($_SESSION['user_role'] == 1 ){
                Functions::redirect("index.php");                    
			}else if($_SESSION['user_role'] == 2 ){
				if($_SESSION['is_first_login'] == 1)
					Functions::redirect("doctor/details.php");
				else
					Functions::redirect("doctor/dashboard.php");
			}
			echo $_SESSION['user_id'];
		}else{
			$flag = 1;
		}
	}else if(isset($_POST['register'])){
		extract($_POST);
		$obj = new User();
		//validation
		$obj->addUser($user_name,$user_ph_no,$user_pass);
        Functions::redirect("profile.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Login";
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
                        <span class="breadcrumbs__page c-gray">Login &ndash; Signup</span>
                    </li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .container -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="form-login js-login-form">
                        <div class="form-login__block js-form-block is-selected" id="signin">
                             <?php
									if ($flag) {
										?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											Wrong Username or Password Please try later!
										</div>
										<?php
									}
							?>
                               <form action="" method="post" id="ds-login">
                                <div class="form-container">
                                    <h3 class="form-title t-center">Log In</h3>
                                    <!-- .form-social -->
                                    <div class="form-group">
                                        <label for="user_number">Phone Number</label>
                                        <input type="text" name="user_number" id="user_number" class="form-input form-input--pill form-input--border-c-gallery" placeholder="(123) 456-7890">
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group">
                                        <label for="user_password">Password</label>
                                        <input type="password" name="user_password" id="user_password" class="form-input form-input--pill form-input--border-c-gallery" placeholder="******">
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group">
                                        <div class="form-group__container">
                                            <a href="#reset" class="c-gray js-block-trigger ml-auto">Forgot Password?</a>
                                        </div>
                                        <!-- .form-group__container -->
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group--submit">
                                        <button name="login" class="button button--primary button--pill button--large button--block button--submit" type="submit">Log In</button>
                                    </div>

                                    <div class="form-group--footer">
                                        <span class="c-gray">Don't have an account? <a href="#signup" class="c-secondary t-underline js-block-trigger">Register</a></span>
                                    </div>
                                </div>
                                <!-- .form-container -->
                            </form>
                            <!-- .signin -->
                        </div>
                        <!-- .form-login__block -->

                        <div class="form-login__block js-form-block" id="signup">
                            <form action="" method="POST" role="form" autocomplete="off">
                                <div class="form-container">
                                    <h3 class="form-title t-center">Register</h3>
                                    <!-- .form-social -->
                                    <div class="form-group mb-0">
                                        <div class="form-group__container">
                                            <p href="" class="c-gray ml-auto mb-1">Doctor? <a href="doctor/login.php" class="c-secondary t-underline">Register Here</a> </p>
                                        </div>
                                        <!-- .form-group__container -->
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group">
                                        <label for="signup-name">Name *</label>
                                        <input type="text"  id="user_name" name="user_name" class="form-input form-input--pill form-input--border-c-gallery" required placeholder="John Doe">
                                    </div>
                                    <!-- .form-group -->
                                    
                                    <div class="form-group">
                                        <label for="signup-name">Phone Number</label>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" name="user_ph_no" id="user_ph_no" class="form-input form-input--pill form-input--border-c-gallery" required placeholder="Mobile Number">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .form-group -->
                                                                     
                                   <div class="form-group">
                                        <label for="signup-password">Password *</label>
                                        <input type="password" name="user_pass" id="user_pass" class="form-input form-input--pill form-input--border-c-gallery" required placeholder="******">
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group">
                                        <span class="c-gray">By creating an account your agree to our <a href="#" class="t-underline">Terms and Conditions</a> and our <a href="#" class="t-underline">Privacy Policy</a></span>
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group--submit">
                                        <button name="register" class="button button--primary button--pill button--large button--block button--submit" type="submit" name="register" id="register">Register</button>
                                    </div>

                                    <div class="form-group--footer">
                                        <span class="c-gray">Already have an account?<a href="#signin" class="c-secondary t-underline js-block-trigger"> Log In</a></span>
                                    </div>
                                </div>
                                <!-- .form-container -->
                            </form>
                            <!-- .signup -->
                        </div>
                        <!-- .form-login__block -->

                        <div class="form-login__block js-form-block" id="reset">
                            <form action="/" method="post">
                                <div class="form-container">
                                    <div class="form-group">
                                        <label for="reset-password">Email</label>
                                        <input type="email" name="reset-password" id="reset-password" class="form-input form-input--pill form-input--border-c-gallery" placeholder="johndoe@gmail.com" required>
                                    </div>
                                    <!-- .form-group -->

                                    <div class="form-group--submit">
                                        <button class="button button--primary button--pill button--large button--block button--submit" type="submit">Reset Password</button>
                                    </div>

                                    <div class="form-group--footer">
                                        <a href="#signin" class="c-secondary t-underline js-block-trigger">Back to Log In</a>
                                    </div>
                                </div>
                                <!-- .form-container -->
                            </form>
                            <!-- .reset -->
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
    ?>

</body>

</html>