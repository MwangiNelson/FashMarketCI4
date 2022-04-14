<?php
$session = session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include('header.php'); ?>

</head>

<body>

    <div class="containerx" id="par">
        <div id="SideNav" class="SideNavigation">
            <nav>
                <div id="closeBtn">
                    <i class="bi bi-x-lg" style="font-size: 1.5rem; color:white; " id="close-btn" onclick="closefn()"></i>
                </div>
                <div class="list-holder">
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo "<div class='cont'>
                   <h4>Categories</h4>
                   <hr class='rgba-white-light' style='margin: 5% 5%;'>
                   <ul>
                       <li><a href='store'>MEN</a></li>
                       <li><a href='store'>WOMEN</a></li>
                       <li><a href='store'>KIDS</a></li>
                       <li><a href='store'>PETS</a></li>

                   </ul>
               </div>";
                    }
                    ?>
                    <div class="cont">
                        <h4>Extras</h4>
                        <hr class="rgba-white-light" style="margin: 5% 5%;">
                        <ul>
                            <li><?php
                                if (!isset($_SESSION['name'])) {
                                    echo "<a href='login'>STORE</a>";
                                } else {
                                    echo "<a href='trial'>STORE</a>";
                                }
                                ?></li>
                            </li>

                            <li>
                                <?php
                                if (!isset($_SESSION['name'])) {
                                    echo "<a href='login'>LOGIN</a>";
                                } else {
                                    echo "<a href='#'>PROFILE</a>";
                                }
                                ?>
                            </li>
                            <li><a href="#">PROMOTIONS</a></li>
                        </ul>
                    </div>
                    <div class="cont">
                        <h4>Site Details</h4>
                        <hr class="rgba-white-light" style="margin: 5% 5%;">
                        <ul>
                            <li><a href="#">COOKIE POLICY</a></li>
                            <li><a href="#">TERMS & CONDITIONS</a></li>
                            <li><a href="#">LEGAL</a></li>
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo "<li><a href='authenticate/logout'>LOGOUT</a></li>";
                            }
                            ?>

                        </ul>
                    </div>


                </div>

            </nav>
        </div>

        <div class="test" id="test">
            <?php include('navbar.php'); ?>
        </div>

        <div id="Mycarousel" class="carousel slide" data-bs-ride="carousel" style="width: 100%; display:flex; flex-wrap:nowrap;">
            <div class="carousel-indicators" style="bottom: 0;">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="display:inline-flex; margin-top:20vh;">
                <div class="carousel-item active">
                    <div class="holder">
                        <div class="image-holder">
                            <img src="images/winterfashion.jpg" alt="">
                        </div>
                        <div class="description">
                            <div class="im">
                                <img src="images/snow.png" style="width:150px; height:150px; object-fit: contain;" alt="">
                            </div>
                            <h2>Winter sale is here!</h2>
                            <p>Enjoy the chilly winter in style with great discounts up to 40% off!</p>
                            <i class="bi bi-arrow-down" style="font-size: 25px;"></i>
                            <div class="banner-btn">
                                <?php
                                if (!isset($_SESSION['name'])) {
                                    echo "<a href='login'> <span></span> Visit store </a>";
                                } else {
                                    echo "<a href='store'> <span></span> Visit store </a>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="holder">
                        <div class="image-holder">
                            <img src="images/fest.jpg" alt="">
                        </div>
                        <div class="description">
                            <div class="im">
                                <img src="images/sock.png" style="width:150px; height:150px; object-fit: contain;" alt="">
                            </div>
                            <h2>Get Vestive!</h2>
                            <p>It's that time of the year to get festive in style!</p>
                            <i class="bi bi-arrow-down" style="font-size: 25px;"></i>
                            <div class="banner-btn">
                                <?php
                                if (!isset($_SESSION['name'])) {
                                    echo "<a href='login'> <span></span> Visit store </a>";
                                } else {
                                    echo "<a href='store'> <span></span> Visit store </a>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="holder">
                        <div class="image-holder">
                            <img src="images/summer.jpg" alt="">
                        </div>
                        <div class="description">
                            <div class="image-holder">
                                <img src="images/sock.png" style="width:150px; height:150px; object-fit: contain;" alt="">
                            </div>
                            <h2>Winter sale is here!</h2>
                            <p>Enjoy the chilly winter in style with great discounts up to 40% off!</p>
                            <i class="bi bi-arrow-down" style="font-size: 25px;"></i>
                            <div class="banner-btn">
                                <?php
                                if (!isset($_SESSION['name'])) {
                                    echo "<a href='login'> <span></span> Visit store </a>";
                                } else {
                                    echo "<a href='store'> <span></span> Visit store </a>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#Mycarousel" data-bs-slide="prev" style="height: 200px; margin-top:200px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#Mycarousel" data-bs-slide="next" style="height: 200px; margin-top:200px;">

                <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </button>


        </div>
        <script>

        </script>
    </div>

    <div class="cont-1">
        <h3>Featured Products</h3>
        <hr class="line">
        <div class="product_page" id="featured_section">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            displayFeatured();

        })

        function displayFeatured() {
            $.ajax({
                url: "<?php echo base_url('authenticate/get_featured') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response.products, function(key, value) {
                        $("#featured_section").append(
                            "<div class='product-container'><img src='assets/" + value.product_image + "' alt=''><p>" + value.product_name + "</p><h4>$ " + value.product_price +
                            ".00<h4> <button id='featured-btn' data-id=" + value.product_id + " class='btn btn-warning'><a href='store'> <i class='fal fa-bags-shopping'></i> |  Proceed to store</a></button> </div></div>"
                        )
                    })
                }
            })

        }

    </script>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<!-- Footer -->
<?php include('footer.php'); ?>
<!-- Footer -->
<!-- Footer -->

</html>