<?php

namespace App\Models;

use CodeIgniter\Model;

class products_model extends Model
{
    // ...\
    protected $table = 'tbl_products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_name', 'product_quantity', 'product_image', 'product_price', 'product_category', 'is_featured'];



    public function displayCatalog()
    {
        $db = db_connect();

        $status = $db->query("SELECT * FROM tbl_products");

        return $status->getResultArray();
    }
    
    public function displayFeatured()
    {
        $db = db_connect();

        $status = $db->query("SELECT * FROM tbl_products WHERE is_featured = 1");

        return $status->getResultArray();
    }

    public function displayOrders()
    {
        $db = db_connect();

        $status = $db->query("SELECT tbl_orders.*,tbl_products.*,users.full_name FROM `tbl_orders` INNER JOIN tbl_products ON tbl_orders.ordered_product_id = tbl_products.product_id INNER JOIN users ON tbl_orders.customer_id = users.id WHERE 1;");

        return $status->getResultArray();
    }
    public function newProduct($product_name, $product_price, $product_quantity, $product_category, $product_image, $is_featured)
    {
        $db = db_connect();

        $status = $db->query("INSERT INTO tbl_products (product_name,product_price,product_quantity,product_category,product_image,is_featured)VALUES('$product_name','$product_price','$product_quantity','$product_category','$product_image','$is_featured')");

        return $status;
    }
    public function deleteProduct($id)
    {
        $db = db_connect();
        $status = $db->query("DELETE FROM tbl_products WHERE product_id = $id");

        return $status;
    }
    public function deleteOrder($id)
    {
        $db = db_connect();

        $status = $db->query("DELETE FROM tbl_orders WHERE order_id = $id");

        return $status;
    }
    public function checkproduct($product, $customer)
    {
        $db = db_connect();

        $status = $db->query("SELECT * FROM tbl_orders WHERE ordered_product_id='$product' AND customer_id='$customer'");
        $row = $status->getResultArray();

        if (count($row)) {
            return count($row);
        } else {
            return 'okay';
        }
    }
    public function order($product_id, $customer, $item_quantity, $payment_status)

    {
        $db = db_connect();
        $status = $db->query("INSERT INTO tbl_orders (customer_id,ordered_product_id,order_quantity,order_status)VALUES('$customer','$product_id','$item_quantity','$payment_status')");
        return $status;
    }
    public function getProductId($name)
    {
        $db = db_connect();
        $status = $db->query("SELECT * FROM tbl_products WHERE product_name = $name");
        return $status->getResultArray();
    }
    public function displayCartItems($client_id)
    {
        $db = db_connect();

        $status = $db->query("SELECT tbl_orders.*,tbl_products.* FROM `tbl_orders` INNER JOIN tbl_products ON tbl_orders.ordered_product_id = tbl_products.product_id WHERE customer_id= $client_id  AND order_status= 'pending';");

        return $status->getResultArray();
    }
    public function get_category(){
        $db = db_connect();
        $status = $db->query("SELECT * FROM tbl_categories");
        return $status->getResultArray();
    }
    public function addCategory($ctg_name,$status){
        $db = db_connect();

        $status = $db->query("INSERT INTO tbl_categories(category_name,is_deleted) VALUES ('$ctg_name','$status')");

        return $status;
    }

}
