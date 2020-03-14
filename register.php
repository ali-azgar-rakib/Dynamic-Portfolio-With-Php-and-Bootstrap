<?php
require_once "admin/db.php";
require_once "user_valid.php";
?>

<!doctype html>
<html lang="en">

    

<head>
        <meta charset="utf-8" />
        <title>Regestration</title>
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
        <div class="accountbg" style="background: url('admin/assets/images/bg-2.jpg');background-size: cover;background-position: center;"></div>


        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="index.php" class="text-success">
                                    <span><img src="admin/assets/images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>

                            <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                              <!-- email already exist alert -->
                              <?php if(isset($email_exist)){ ?>                              
                                <div class="alert alert-danger">
                                    <?= $email_exist ?>
                                </div>
                              <?php } ?>

                              

                                <!-- full name -->

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="username">Full Name</label>
                                        <input class="form-control" type="text" id="username" placeholder="Michael Zenaty" name="fname" value="<?php
                                        if(isset($fname)){
                                          echo $fname;
                                        }
                                        ?>">
                                        
                                        
                                        <!-- name error -->
                                        <label style="color:red; font-style:italic;">
                                            <?php
                                            if (isset($input_error['name'])) {
                                              echo $input_error['name'];
                                            }

                                            ?>
                                          </label>

                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="text" id="emailaddress"  placeholder="john@deo.com" name="email" value="<?php 
                                        if(isset($email)){
                                          echo $email;
                                        }
                                        ?>">

                      <!-- =================== email error ====== -->
                                        <label style="color:red;font-style: italic;" for="emailaddress">
                                          <?php
                                            if(isset($input_error['email'])){
                                              echo $input_error['email'];
                                            }
                                          ?>
                                        </label>

                                    </div>
                                </div>

                                <!-- password -->

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password"  id="password" placeholder="Enter 8 length password with number,uppercase and lowercase letter" name="password" value="<?php 
                                        if(isset($password)){
                                          echo $password;
                                        }
                                        ?>">

                                  <!-- ================ password error ========== -->
                                        <label for="password" style="color:red;font-style:italic;">
                                          <?php 
                                            if(isset($input_error['password'])){
                                              echo $input_error['password'];
                                            }
                                          ?>
                                        </label>

                                    </div>
                                </div>

                                <!-- confirm password -->
                                 <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="cpassword">Confirm Password</label>
                                        <input class="form-control" type="password"  id="cpassword" placeholder="Enter your password" name="cpassword" value="<?php
                                          if(isset($password,$cpassword)){
                                            echo $cpassword;
                                          }
                                         ?>">

                                        <!-- confirm password error -->
                                        <label style="color:red;font-style:italic;" for="cpassword">
                                          <?php if(isset($input_error['cpassword'])){
                                            echo $input_error['cpassword'];
                                          } ?>
                                        </label>

                                    </div>
                                </div>


                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        
                                        <input class="form-control" type="file"  placeholder="attached photo" name="photo" >

                                        <!-- photo error -->
                                        <label style="color:red;font-style:italic;" >
                                          <?php if(isset($photo_error)){
                                            echo $photo_error;
                                          } ?>
                                        </label>

                                    </div>
                                </div>


                                <!-- submit  -->

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                I accept <a href="#" class="text-custom">Terms and Conditions</a>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                    <div class="col-12">
                                        <input class="btn btn-block btn-success" type="submit" value="Registration" name="reg_submit">
                                    </div>


                            </form>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Already have an account?  <a href="login.php" class="text-dark m-l-5"><b>Sign In</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="admin/assets/js/jquery.min.js"></script>
        <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
        <script src="admin/assets/js/metisMenu.min.js"></script>
        <script src="admin/assets/js/waves.js"></script>
        <script src="admin/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="admin/admin/assets/js/jquery.core.js"></script>
        <script src="admin/admin/assets/js/jquery.app.js"></script>

    </body>

<!-- Mirrored from coderthemes.com/highdmin/vertical/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2019 06:52:57 GMT -->
</html>