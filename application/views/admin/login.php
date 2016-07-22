<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IPUNG | LOGIN</title>
    <link rel="icon" href="<?php echo media_url('ico/favicon.jpg'); ?>" type="image/x-icon">

    <!-- Bootstrap core CSS -->

    <link href="<?php echo media_url() ?>/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo media_url() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo media_url() ?>/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo media_url() ?>/css/login.css" rel="stylesheet">

    <script src="<?php echo media_url() ?>/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->

          </head>


          <body>


            <div class="container bootstrap snippet">
                <div class="row login-page"> 

                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <section class="login_content">
                                <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">

                                    <img src="<?php echo media_url() ?>/ico/icon_user.png" class="user-avatar"> 
                                    <h1>Admin Login</h1> 
                                    <form role="form" action="<?php echo site_url('admin/auth/login') ?>" method="post" class="ng-pristine ng-valid">
                                        <?php
                                        echo form_open(current_url(), array('role' => 'form', 'class' => 'form-signin'));
                                        if (isset($_GET['location'])) {
                                            echo '<input type="hidden" name="location" value="';
                                            if (isset($_GET['location'])) {
                                                echo htmlspecialchars($_GET['location']);
                                            }
                                            echo '" />';
                                        }
                                        ?>
                                        <div class="form-content"> 
                                            <div class="form-group"> 
                                               <input autofocus type="text" class="form-control input-underline input-lg" placeholder="Username" name="username" required="" />
                                           </div> 
                                           <div class="form-group"> 
                                            <input type="password" class="form-control input-underline input-lg" placeholder="Password" name="password" required="" />
                                        </div> 
                                    </div> 
                                    <button class="btn btn-info btn-lg submit" type="submit">
                                        Log in
                                    </button> &nbsp; 
                                    <a href="<?php echo site_url('#') ?>" target="_blank"><div class="btn btn-info btn-lg">To Web</div></a>


                                </form> 
                            </div> 
                        </section>
                    </div>
                </div>
            </div>
        </div>




    </body>

    </html>