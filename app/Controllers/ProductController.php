<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;

class ProductController extends BaseController
{
    public function product()
    {
        $products = Product::all();
        if (isset($_GET['malsp']))
            $products = Product::where('ID_type', $_GET['malsp'])->get();
        $data = [
            'products' => $products, 'typeProduct' => TypeProduct::all(),
            'cakes' => Product::where('ID_type', 'L01')->count(), 
            'cupcakes' => Product::where('ID_type', 'L02')->count(),
            'pies' => Product::where('ID_type', 'L03')->count(),
            'set_cupcakes' => Product::where('ID_type', 'L04')->count()
        ];
        return $this->sendPage('products/product', $data);
    }
    public function productDetail()
    {
        $masp = $_GET['masp'];
        return $this->sendPage('products/productDetails', ['productDetail'=>Product::where('ID_product', $masp)->first()]);
    }
}
