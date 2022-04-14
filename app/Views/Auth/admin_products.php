<div class="products" style="display: flex; flex-wrap:wrap; margin:0 5%;">
    <div class="productsTable">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>In Stock</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="product_data" id="product_data">
            </tbody>
        </table>
    </div>
    <div class="add_category">
        <h4>Add Category</h4>
        <div class="categoryAdd">
            <label for="newCategory">Category Name:  </label>
            <input type="text" id="category" class="form-control">
            <button type="submit" class="btn btn-primary add-ctg" >Add</button>
        </div>
    </div>

   
    <?php include('dataHandling.php'); ?>
</div>