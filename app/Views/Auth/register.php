<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Estonia&family=Open+Sans+Condensed:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Khand&family=Source+Code+Pro:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <?php include('header.php'); ?>

    <title>Reistration page</title>
    <style>
        ::placeholder {
            font-family: "Barlow Condensed", sans-serif;
        }

        input {
            font-family: "Barlow Condensed", sans-serif;
        }
    </style>

</head>

<body class="h-100" style="background: url('images/p1.jpg');background-size: cover; color:white; background-repeat:no-repeat;   background-attachment: fixed;">

    <section class="form my-4 mx-5" style="font-family: 'Barlow Condensed', sans-serif;  ">

        <div class="container" style="justify-content:center;max-height: 80">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-7 ">

                    <div class="logo-holder text-center " style="width: 100%; justify-content:center; text-align:center;">
                        <img src="images/logo5.png" alt="" style="width: 150px;height: 150px; background:none; border-radius:1px,solid;">
                    </div>


                    <form class="form-control" action="<?= base_url('authenticate/register');?>" method="post" style="background :linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)); border:none;">
                       <?= csrf_field(); ?>
                      
                    <div class="col-lg-7 text-white" style="width:100%; text-align:center;">
                            <i class="fal fa-user-plus" style="font-size: 55px;"></i>
                            <h3>Register</h3>
                        </div>
                        
                        <?php 
                         if(!empty(session()->getFlashdata('fail'))):
                         ?>
                         <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>                        
                        <?php endif ?>

                        <?php 
                         if(!empty(session()->getFlashdata('success'))):
                         ?>
                         <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>                        
                        <?php endif ?>
                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Username:</label>
                                <input type="text" name="username" class="form-control" required >
                                 <span class="text-danger"> <?= isset($validation)? display_error($validation,'username') : '' ?> </span> 
                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Enter your full names:</label>
                                <input type="text" name="full_name" class="form-control" required >
                                <span class="text-danger"> <?= isset($validation)? display_error($validation,'full_name') : '' ?> </span> 
                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Enter your Email Address :</label>
                                <input type="email" name="email" class="form-control" placeholder="example123@gmail.com" required>
                                <span class="text-danger"> <?= isset($validation)? display_error($validation,'email') : '' ?> </span> 
                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7 " style="width: 100%;">
                                <label for="">Password :</label>
                                <input type="password" name="password" class="form-control" placeholder="*********" required >
                                <span class="text-danger"> <?= isset($validation)? display_error($validation,'password') : '' ?> </span> 
                            </div>
                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7 " style="width: 100%;">
                                <label for="">Confirm Password :</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="*********" required>
                                <span class="text-danger"> <?= isset($validation)? display_error($validation,'cpassword') : '' ?> </span> 
                            </div>

                        </div>
                        <div class="form-row text-white" style="margin-top: 10px;">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Sign Up</button>

                            </div>
                            <p class="text-white">Already have an account? <a href="login">Sign In Here</a></p>
                        </div>
                </div>

                </form>

            </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <footer class="page-footer font-small special-color-dark " style="background-color: #343434; font-family: 'Khand', sans-serif;margin-top:5%;">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#" style=" text-decoration:none;"> Fash Market.info</a>
        </div>
        <!-- Copyright -->

    </footer>
</body>
<!-- Footer -->

<!-- Footer -->

</html>