<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="tabledt">
        <table>
            <thead>
                <tr>
                    <th>Nmae</th>
                    <th>Amt</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($products_data as $details) { ?>

                    <td><?php echo $details['product_name']; ?></td>
                    <td><?php echo $details['product_quantity']; ?></td>
                    <td><?php echo $details['product_price']; ?></td>
                    <td><?php echo $details['product_category']; ?></td>





                <?php } ?>

            </tbody>
        </table>
    </div>




</body>

</html>