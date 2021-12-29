<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          return new Product([
           'product_name' => $row[0],
           'product_quantity' => $row[1],
           'product_sold' => $row[2],
           'product_slug' => $row[3],
           'category_id' => $row[4],
           'brand_id' => $row[5],
           'product_desc' => $row[6],
           'product_content' => $row[7],
           'product_price' => $row[8],
           'product_image' => $row[9],
           'product_status' => $row[10],
        ]);
    }
}
