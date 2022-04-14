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
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/1225249676.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Registration page</title>
    <style>
        ::placeholder {
            font-family: 'Barlow Condensed', sans-serif;
        }

        input {
            font-family: 'Barlow Condensed', sans-serif;
        }

        a {
            text-decoration: none;
            color: #979aaa;
        }

        a:hover {
            color: #0080ff;

        }

        #laliho a {
            margin-left: 10px;
        }

        .containe {
            background-color: #ffc40c;
        }

        .lali a:nth-child(1) :hover {
            color: #4267B2;
        }

        .lali a:nth-child(2) :hover {
            color: #1DA1F2;
        }

        .lali a:nth-child(3) :hover {
            color: #db4a39;
        }

        .lali a:nth-child(4) :hover {
            color: #0072b1;
        }

        .lali a:nth-child(5) :hover {
            color: #8a3ab9;
        }

        .lali a:nth-child(6) :hover {
            color: #c8232c;
        }
    </style>

</head>

<body class="h-100" style="background: url('images/p1.jpg');background-size: cover; color:white; background-repeat:no-repeat;  background-attachment: fixed;">
    <a href="admin"> <img src="images/logo5.png" class="logologin" alt="" style="width: 100px;height: 180px;top:-30px; left: 10px; object-fit:contain;  border-radius: 2px;position:fixed;"> </a>

    <section class="form my-4 mx-5" style=" font-family: 'Barlow Condensed', sans-serif; ">

        <div class="container" style="justify-content:center;max-height: 80">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-7 ">


                    <form method="post" class="form-control" action="<?= base_url('authenticate/registerAdmin'); ?>" style="background :linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)); border:none;">
                        <?= csrf_field(); ?>
                        <div class="col-lg-7 text-white" style="width:100%; text-align:center;">

                            <i class="fal fa-user-plus" style="font-size: 55px;"></i>
                            <h3>Register Administrator</h3>
                        </div>

                        <?php
                        if (!empty(session()->getFlashdata('fail'))) :
                        ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif ?>

                        <?php
                        if (!empty(session()->getFlashdata('success'))) :
                        ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif ?>


                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Username:</label>
                                <input type="text" class="form-control" placeholder="eg.Mikey" name="username" required>
                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Enter your full names:</label>
                                <input type="text" class="form-control" placeholder="eg.Mike Oxlong" name="full_name" required>
                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Enter your Email Address :</label>
                                <input type="email" class="form-control" name="email" placeholder="example123@gmail.com" required>
                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7 " style="width: 100%;">
                                <label for="">Password :</label>
                                <input type="password" class="form-control" name="password" placeholder="*********" required>
                            </div>
                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7 " style="width: 100%;">
                                <label for="">Confirm Password :</label>
                                <input type="password" class="form-control" name="cpassword" placeholder="*********" required>
                            </div>

                        </div>
                        <div class="form-row text-white" style="margin-top: 10px;">
                            <div class="d-grid gap-2">
                                <button class="btn btn-warning" type="submit">Sign Up Administarator</button>

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
    <script src="https://use.fontawesome.com/1225249676.js"></script>
    <!-- Footer -->

    <!-- Footer -->
</body>
<!-- Footer -->
<footer class="page-footer font-small special-color-dark " style="background-color: #343434;margin-top:5%;">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#" style=" text-decoration:none;"> Fash Market.info</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

</html>