<?php
$session = session();
?>

<!doctype html>
<html lang="en">

<head>
    <?php include('header.php'); ?>

    <input id="admin_id" value="<?php
                                $session = session();
                                echo $session->get('userid');
                                ?>" type="hidden">
    <!-- Required meta tags -->

    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
</head>

<body>
    <div class="top">
        <nav class="navbar2">
            <div class="men">
                <img src="images/logo5.png" style="width: 150px;top:5px; float:center;   height: 120px; object-fit: contain; " alt="" class="align-top">
            </div>
        </nav>
    </div>

    <div class="warpper">
        <input class="radio" id="one" name="group" type="radio" checked>
        <input class="radio" id="two" name="group" type="radio">
        <input class="radio" id="three" name="group" type="radio">
        <input class="radio" id="four" name="group" type="radio">
      

        <div class="tabs">
            <label class="tab" id="one-tab" for="one"> <i class="fal fa-tachometer-alt-fastest"></i> <span> Dashboard</span></label>
            <label class="tab" id="two-tab" for="two"> <i class="fal fa-bags-shopping"></i> <span> Orders</span></label>
            <label class="tab" id="three-tab" for="three"><i class="fal fa-sitemap"></i> <span>Products </span></label>
            <label class="tab" id="four-tab" for="four"> <i class="fal fa-users"></i> <span> Users</span></label>
            <a href="auth" style="text-decoration: none;"><label class="tab" id="five-tab" for="five"> <i class="fal fa-door-open"></i><span> Go to site</span></label> </a>
        

        </div>
        <div class="panels">
            <div class="panel" id="dashboard-panel">
                <?php include('admin_dash.php'); ?>
            </div>
            <div class="panel" id="orders-panel">
                <?php include('admin_orders.php'); ?>
            </div>
            <div class="panel" id="products-panel">
                <?php include('admin_products.php'); ?>
            </div>
            <div class="panel" id="users-panel">
                <?php include('usersTable.php'); ?>
            </div>
          
        </div>
    </div>
    <script>
        $(document).ready(function() {
            displayProducts();
            displayUsers();
            displayOrders();
            displayAdmin();
            getCategories();
        })

        function displayProducts() {
            $.ajax({
                url: "<?php echo base_url('authenticate/get_products') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response.products, function(key, value) {
                        $("#product_data").append(
                            "<tr><td>" + value.product_name + "</td> <td> " + value.product_quantity + "</td><td> $ " + value.product_price +
                            ".00</td><td class='btns'><button class='btn btn-danger delete-product' data-id=" + value.product_id + "><i class='fal fa-trash-alt'></i></button><button class='btn btn-warning' data-id=" + value.product_id + "><a href='#addItem'><i class='far fa-pen'></i></a></button></td></tr>"
                        )
                    })
                }
            })

        }

        function displayOrders() {
            $.ajax({
                url: "<?php echo base_url('authenticate/get_orders') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response.orders, function(key, value) {
                        $("#orders_table_data").append(
                            "<tr class='o-data'><td class='o_id'>" + value.order_id + "</td> <td> " + value.full_name + "</td> <td> " + value.product_name + "</td><td>" + value.order_quantity + "</td><td>" + value.product_price + "</td><td>" + value.order_status +
                            "</td><td class='btns'><button class='btn btn-danger delete-order' data-id=" + value.order_id + "><i class='fal fa-trash-alt'></i></button></td></tr>"
                        )
                    })
                }
            })

        }

        function displayUsers() {
            $.ajax({
                url: "<?php echo base_url('authenticate/get_users') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response.users, function(key, value) {
                        $("#users_data_table").append(
                            "<tr><td>" + value.id + "</td> <td> " + value.full_name + "</td><td>" + value.username + "</td><td>" + value.email +
                            "</td><td class='btns'><button class='btn btn-danger delete-user' data-id=" + value.id + "><i class='fal fa-trash-alt'></i></button></td></tr>"
                        )
                    })
                }
            })

        }

        function getCategories() {
            $.ajax({
                url: "<?php echo base_url('authenticate/get_category') ?>",
                method: 'GET',
                success: function(response) {
                    $.each(response.categories, function(key, value) {
                        $(".ctg-list").append(
                            " <option value='" + value.category_id + "'>" + value.category_name + "</option>"
                        )
                    })
                }
            })
        }

        function displayAdmin() {

            var details = {
                'admin_id': $('#admin_id').val()
            };

            $.ajax({
                url: "<?php echo base_url('authenticate/getAdmin') ?>",
                method: 'POST',
                data: details,
                success: function(response) {
                    $.each(response.data, function(key, value) {
                        $("#full_name").html(
                                " <p class='text-muted mb-0' style='width:80%;' >" + value.full_name + "</p>"
                            ),
                            $("#admin_email").html(
                                " <p class='text-muted mb-0' style='width:80%;' >" + value.email + "</p>"
                            )


                    })


                }
            })

        }
        $(document).on('click', '.add-ctg', function() {
            var data = {
                'category_name': $('#category').val()
            };
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('authenticate/add_category') ?>",
                data: data,
                success: function(response) {
                    if (response == 1) {
                        alert('Category added')
                        document.getElementById('category').value = ''

                        $('#product_category').html("");
                        getCategories();
                    } else {
                        alert('Category not added')
                    }
                }

            })
        })
        $(document).on('click', '.delete-product', function() {
            var product_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('authenticate/deleteProduct') ?>",
                data: {
                    product_id: product_id
                },
                success: function(response) {
                    if (response == 1) {
                        alert('Product deleted')
                        $('#product_data').html("");
                        displayProducts();
                    } else {
                        displayProducts();
                    }
                }

            })
        })
        $(document).on('click', '.delete-user', function() {
            var user_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('authenticate/deleteUser') ?>",
                data: {
                    user_id: user_id
                },
                success: function(response) {
                    if (response == 1) {
                        $('#users_data_table').html("");
                        displayUsers();
                    } else {
                        alert('Error deleting user')
                        displayUsers();
                    }
                }

            })
        })
        $(document).on('click', '.delete-order', function() {
            var order_id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('authenticate/deleteOrder') ?>",
                data: {
                    order_id: order_id
                },
                success: function(response) {
                    if (response == 1) {
                        $('#orders_table_data').html("");
                        displayOrders();
                    } else {
                        alert('Error deleting user')
                        displayOrders();
                    }
                }

            })
        })
        $('.add-product').click(function(e) {
            var data = {
                'product_name': $('#product_name').val(),
                'product_quantity': $('#product_quantity').val(),
                'product_price': $('#product_price').val(),
                'product_category': $('product_#category').val(),
                'is_featured': $('#product_rating').val()
            }

            $.ajax({
                url: "<?php echo base_url('authenticate/newProducts') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $('#product_data').html("");

                    displayProducts();

                }
            })
        })
    </script>
</body>

</html>