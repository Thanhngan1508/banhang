<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProduct implements FromCollection
{
    /**
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection()
    {
        return Product::all();
       
    }
}
