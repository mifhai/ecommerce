<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithValidation
{

    use Importable;


    public function rules(): array
    {
        return [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'required',
            '10' => 'required',
            '11' => 'required',
            '12' => 'required',
            '13' => 'required',
            '14' => 'required',
            '15' => 'required',
            '16' => 'required'
        ];

    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name_product' => $row[0],
            'brands' => $row[1],
            'category_product' => $row[2],
            'processor' => $row[3],
            'storage' => $row[4],
            'layar' => $row[5],
            'short_desc' => $row[6],
            'description' => $row[7],
            'price' => $row[8],
            'diskon' => $row[9],
            'image' => $row[10],
            'sku' => $row[11],
            'berat' => $row[12],
            'stok' => $row[13],
            'status' => $row[14],
            'recomended' => $row[15],
            'preorder' => $row[16]
        ]);
    }
}
