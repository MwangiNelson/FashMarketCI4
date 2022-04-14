<?php

namespace App\Models;

use CodeIgniter\Model;

class AjaxProduct extends Model
{
    // ...
    protected $table = 'tbl_products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_name', 'product_quantity', 'product_price', 'product_category', 'is_featured'];


    public function displayCatalog()
    {
        $db = db_connect();

        $status = $db->query("SELECT * FROM tbl_products");

        return $status->getResultArray();
    }
}
