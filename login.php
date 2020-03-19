<?php
require_once "admin/db.php"; 
require_once "login_val.php"; 
?>
<!doctype html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/highdmin/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2019 06:52:57 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="admin/assets/images/favicon.ico">

        <!-- App css -->
        <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="admin/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="admin/assets/js/modernizr.min.js"></script>

    </head>


    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('admin/assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="#" class="text-success">
                                    <span>
                                        <!-- logo here -->
                                    </span>
                                </a>
                            </h2>

                            <form class="" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                                <!-- user add success message -->
                              <?php if(isset($_SESSION['user_success'])){ ?>                              
                                <div class="alert alert-success">
                                    <?= $_SESSION['user_success'] ?>
                                </div>
                              <?php } 
                              unset($_SESSION['user_success']);
                              ?>

                              
                              <!-- email not match     -->

                              <?php if(isset($email_not_matched)) { ?>
                                <div class="alert alert-danger">
                                  <?=$email_not_matched?>
                                </div>
                              <?php } ?>

                            <!-- password not match -->

                              <?php if(isset($password_not_matched)) { ?>
                                <div class="alert alert-danger">
                                  <?=$password_not_matched?>
                                </div>
                              <?php } ?>

                              <!-- waiting for admin approval -->
                              <?php if(isset($waiting)) { ?>
                                <div class="alert alert-success">
                                  <?=$waiting?>
                                </div>
                              <?php } ?>



                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="text" id="emailaddress"  placeholder="Enter your email"  name="email" value="<?php if(isset($email)){
                                          echo $email;
                                        } ?>">

                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <a href="#" class="text-muted float-right"><small>Forgot your password?</small></a>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password"  id="password" placeholder="Enter your password" name="password" value="<?php if(isset($password)){
                                          echo $password;
                                        } ?>">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <input class="btn btn-block btn-success" type="submit" value="Login" name="login">
                                    </div>
                                </div>

                            </form>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="register.php" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright"><?=date('Y')?> © Ali Azgar Rakib</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="admin/assets/js/jquery.min.js"></script>
        <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
        <script src="admin/assets/js/metisMenu.min.js"></script>
        <script src="admin/assets/js/waves.js"></script>
        <script src="admin/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="admin/assets/js/jquery.core.js"></script>
        <script src="admin/assets/js/jquery.app.js"></script>

    </body>

</html>