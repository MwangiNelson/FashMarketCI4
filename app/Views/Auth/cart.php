<?php
$session = session();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php") ?>
    <input id="customerid" value="<?php
                                            $session = session();
                                            echo $session->get('userid');
                                            ?>" type="hidden">
    <link rel="stylesheet" href="css/style.css">
    <title> The Cart™</title>
</head>

<body>
    <?php
    $session = session();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <?php include("cart_navbar.php") ?>

    <div class="cart">
        <div class="spacer">

        </div>
        <div class="cartheader">
            <h4>View Cart</h4>
            <hr>
        </div>
        <div class="cart-body">
            <div class="item-table">
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody id="cart_table_data">
                    </tbody>
                </table>
            </div>
            <div class="totals">
                <table>
                    <tbody class="tfoot">
                        <tr class="sub_total">
                            <td></td>
                            <td></td>
                            <td>Net Amount:</td>
                            <td></td>
                        </tr>
                        <tr class="total_items">
                            <td></td>
                            <td></td>
                            <td>Total Items </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button type="button" class="btn btn-success">Proceed to Checkout</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            displayCart();
        })

        function displayCart() {
            var total_cost = 0;
            var total_items = 0
            var details = {
                'customer': $('#customerid').val()
            };
            $("#cart-items").html("");
            $.ajax({
                url: "<?php echo base_url('authenticate/fillCart') ?>",
                method: 'POST',
                data: details,
                success: function(response) {
                    $.each(response.orders, function(key, value) {
                        $("#cart_table_data").append(
                            "<tr><td><div class='chosen_product'><div class='product_image'><img src='assets/" + value.product_image +
                            "' alt=''></div><div class='chosen-product-name'><h4>" + value.product_name +
                            "</h4></div></div></td>  <td><div class='counter'><input type='number' class='product_quantity' min='1' value='" + value.order_quantity +
                            "' max='" + value.product_quantity +
                            "' name='qty' id='qty'></div></td>  <td class='price_tag'> <p>$ " + value.product_price +
                            "</p> </td> <td class='btns2'><button class='btn btn-danger delete-product' data-id=" + value.order_id +
                            "><i class='fal fa-trash-alt del-cart-product'></i></button> </td> </tr>"
                        )
                        total_cost += parseInt(value.order_quantity) * parseInt(value.product_price)
                        total_items += parseInt(value.order_quantity)

                    })
                    $(".sub_total").html(
                        " <td></td> <td></td> <td>Total Cost : </td><td> $ " + total_cost + " .00</td>"
                    )
                    $(".total_items").html(
                        " <td></td> <td></td> <td>Total Items : </td><td>" + total_items + " Items</td>"
                    )
                }
            })

        }
        $(document).on('click', '.delete-product', function() {
            var order_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('authenticate/deleteOrder') ?>",
                data: {
                    order_id: order_id
                },
                success: function(response) {
                    if (response == 1) {
                        $('#cart_table_data').html("");
                        displayCart();
                    } else {
                        alert('Error deleting order')
                        displayCart();
                    }
                }

            })
        })
    </script>
</body>


</html>