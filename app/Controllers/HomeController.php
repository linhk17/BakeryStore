<?php
    namespace App\Controllers;
    use App\Models\Product;
    use App\Models\TypeProduct;
    class HomeController extends BaseController{
        public function error(){
            return $this->sendPage('errors/error');
        }

        public function index(){
            $product = Product::where('ID_type','L01')->limit(6)->get();
            return $this->sendPage('home/index',['products'=>$product]);
        }
        
        public function search(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $data = ['products'=>Product::where('name_product','like' ,'%'.$_POST["search"].'%')->get(),
                        'typeProduct'=>TypeProduct::all(),
                        'cakes' => Product::where('ID_type', 'L01')->count(), 
                        'cupcakes' => Product::where('ID_type', 'L02')->count(),
                        'pies' => Product::where('ID_type', 'L03')->count(),
                        'set_cupcakes' => Product::where('ID_type', 'L04')->count()
            ];
                return $this->sendPage('products/product',$data);
            }
        }
    }

?>