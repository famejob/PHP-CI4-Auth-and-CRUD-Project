<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'pd_id';
    protected $allowedFields = ['pd_name', 'pd_img_url', 'pd_desc', 'pd_price'];
}
