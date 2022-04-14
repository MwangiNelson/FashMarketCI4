<?php
$session = session();
?>
<!doctype html>
<html lang="en" class="h-100">

<head>

    <title>Login</title>
    <style>
        ::placeholder {
            font-family: "Barlow Condensed", sans-serif;
        }

        input {
            font-family: "Barlow Condensed", sans-serif;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
    <?php include('header.php'); ?>
</head>




<body class="h-100" style="background: url('images/p1.jpg');background-size: cover; color:white;  background-attachment: fixed; ">

    <section class="form my-4 mx-5" style="font-family: 'Barlow Condensed', sans-serif; color:white; height:100vh; ">

        <div class="container" style="justify-content:center;">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-7 ">

                    <div class="logo-holder text-center " style="width: 100%; justify-content:center; text-align:center;">
                       <a href="auth"> <img src="images/logo5.png" alt="" style="width: 150px;height: 150px; background:none; "></a> 
                    </div>
                    <?= csrf_field(); ?>
                    <form class="form-control" action="" method="post" style="background :linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)); border:none;">
                        <div class="col-lg-7 text-white" style="width:100%; text-align:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                            <h3>Login</h3>
                        </div>
                        <?php
                        if (!empty(session()->getFlashdata('fail'))) :
                        ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif ?>
                        <div class="form-row text-white">
                            <div class="col-lg-7" style="width: 100%;">
                                <label for="">Email Address :</label>
                                <input class="form-control" id="email" placeholder="example123@gmail.com" name="email">

                            </div>

                        </div>
                        <div class="form-row text-white">
                            <div class="col-lg-7 " style="width: 100%;">
                                <label for="">Password :</label>
                                <input type="password" class="form-control" id="password" placeholder="*********" name="password">

                            </div>
                        </div>
                        <div class="form-row text-white" style="margin-top: 10px;">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" id="login" type="submit">Log In</button>

                            </div>


                            <a href="#">Forgot Password?</a>
                            <p class="text-white">Dont have an account? <a href="register">Register Here</a></p>
                        </div>
                </div>

                </form>

            </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#login', function() {
                if ($.trim($('#email').val()).length == 0 || $.trim($('#password').val()).length == 0) {
                    message = 'Please fill both fields';
                    $('#error-display').css('display', 'flex');
                    $('#error-display').text(message);

                } else {
                    var data = {
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    };
                    $.ajax({
                        url: "<?php echo base_url('authenticate/UserLogin') ?>",
                        method: 'POST',
                        data: data,
                        success: function(result) {
                            if (result == 1) {
                                window.location.replace('<?php echo base_url('auth') ?>');
                            }
                        }
                    })
                }

            });
            $(document).on('click', '#login', function() {
                if ($.trim($('#email').val()).length == 0 || $.trim($('#password').val()).length == 0) {
                    message = 'Please fill both fields';
                    $('#error-display').css('display', 'flex');
                    $('#error-display').text(message);

                } else {
                    var data = {
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    };
                    $.ajax({
                        url: "<?php echo base_url('authenticate/AdminLogin') ?>",
                        method: 'POST',
                        data: data,
                        success: function(result) {
                            if (result == 1) {
                                window.location.replace('<?php echo base_url('admin') ?>');
                            }
                        }
                    })
                }

            });
        });
    </script>
    <footer class="page-footer font-small special-color-dark " style="background-color: #343434; font-family: 'Khand', sans-serif; margin-top:0%; width:100%;">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#" style=" text-decoration:none;"> Fash Market.info</a>
        </div>
        <!-- Copyright -->

    </footer>
</body>

</html>