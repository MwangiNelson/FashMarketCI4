<?php
$session = session();
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('header.php'); ?>
    <input id="customerid" value="<?php
                                            $session = session();
                                            echo $session->get('userid');
                                            ?>" type="hidden">
    <link rel="stylesheet" href="css/style.css">
    <title>Store™ </title>
</head>

<body>
    <?php include("navbar.php")  ?>
    <!---Holder ya men/women/kids/pets 'a' links--->
    <div class="b-section">
        <div class="title" style="text-align: center; width:100%;">
            <h3 style="font-family: 'Quicksand', sans-serif;">
                Fash Market Store™
            </h3>
        </div>
        <hr style="color:black; width:100%; margin:0 10%;">
        <div class="link-holder" style="display: flex; flex-wrap:wrap; justify-content:space-evenly; ">
            <a id="alls" href="">All</a>
            <a class="pp" target="1" href="">Men</a>
            <a class="pp" target="2" href="">Women</a>
            <a class="pp" target="3" href="">Kids</a>
            <a class="pp" target="4" href="">Pets</a>
        </div>
        <hr style="color:black; width:100%; margin:0 10%;">
    </div>
    <!---Page ya wanaume!!!!--->
    <div class="m-section" id="m-section1">
    </div>
    <!--Page ya wamama!!!!--->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            displayProducts();

        })

        function displayProducts() {
            $.ajax({
                url: "<?php echo base_url('authenticate/get_products') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response.products, function(key, value) {
                        $("#m-section1").append(
                            "<div class='p-container'><div class='product-display-image'><img src='assets/" + value.product_image + "' alt=''></div><div class='sell'><p class='product_name'>" + value.product_name + "</p><div class='pricing'><h4>$</h4><h4 class='product_price'>" + value.product_price +
                            "</h4><h4>.00</h4></div><div > <button id='cart-btn' data-id=" + value.product_id + " class='btn btn-warning'>Add to cart</button></div> <div class='counter'> <input type='number'  class='product_quantity' min='1' value='1' max='" + value.product_quantity + "' name='qty' id='qty'> </div></div></div>"
                        )
                    })
                }
            })

        }

        $(document).on('click', '#cart-btn', function() {
            var details = {
                'productid': $(this).data('id'),
                'customer': $('#customerid').val(),
                'product_name': $(this).parent().parent().find('.product_name').html(),
                'item_price': $(this).parent().parent().find('.product_price').html(),
                'item_quantity': $('#qty').val()

            };
            console.log(details);
            $.ajax({
                url: "<?php echo base_url('authenticate/addtoCart') ?>",
                method: 'post',
                data: details,
                success: function(result) {
                    if (result == 1) {
                        alert('Product Added to Cart');
                    } else if (result == 'duplicate') {
                        alert('This item has already been added to the cart');
                    } else {
                        console.log(result)
                        alert('an unexpected error has been encountered');
                    }

                }
            })
        })




        $(document).ready(function() {
            $("#qty").prop("disabled", true);
            $(document).on("click", ".plus", function() {
                $("#qty").val(parseInt($("#qty").val()) + 1);
            });
            $(document).on("click", ".minus", function() {
                $("#qty").val(parseInt($("#qty").val()) - 1);
                if ($("#qty").val() == 0) {
                    $("#qty").val(1);
                }
            });
        });
    </script>
</body>
<?php include("footer.php")  ?>

</html>