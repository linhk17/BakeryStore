<?php

namespace App\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\User;
use PDOException;

class AdminController extends BaseController
{   
    public function index(){
        $data = ['bills' => Bill::all(),'countBill' => Bill::count(),
        'countProduct' => Product::count(), 'countUser' => User::count()];
        return $this->sendPage('admins/dashboard', $data);
    }
    public function Bill()
    {
        if (isset($_GET['accept'])) {
            Bill::where('ID_bill', $_GET['accept'])->update(['status_bill' => 'Đã xác nhận']);
        }
        $data = ['bills' => Bill::all(), 'countBill' => Bill::count(),
         'countProduct' => Product::count(), 'countUser' => User::count()];
        return $this->sendPage('admins/bill', $data);
    }
    public function BillDetail(){
        
        return $this->sendPage('admins/billdetail',['details'=>BillDetail::join('products','products.ID_product','=', 'bill_detail.ID_product')->where('ID_bill',$_GET['detail'])->get()]);
        
    }
    public function BillCancle(){
        Bill::where('ID_bill', $_GET['del'])->update(['status_bill' => 'Đã hủy']);
        return $this->sendPage('admins/bill',['bills'=>Bill::all()]);
        
    }
    public function Product()
    { 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            Product::where('ID_product', $_POST['ID'])->update([
                'name_product'=>$_POST['name'],
                'price'=>$_POST['price'],
                'ID_type'=>$_POST['opt_edit']

            ]);
        }
        return $this->sendPage('admins/Product', ['products' => Product::all()]);
    }
    public function DeleteProduct()
    {   
        Product::where('ID_product',$_GET['del'])->delete();
        session()->setFlash(\FLASH::SUCCESS, "Delete Successfully !");
        return $this->sendPage('admins/Product', ['products' => Product::all()]);
        
    }
    public function Insert()
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            try{
             Product::create([
                'ID_product'=>$_POST['ID'],
                'name_product'=> $_POST['name'],
                'price'=>$_POST['price'],
                'ID_type'=>$_POST['opt'],
                'image'=>$_POST['image']
            ]);
            session()->setFlash(\FLASH::SUCCESS, "Successfully !"); 
            return $this->sendPage('admins/Product', ['products' => Product::all()]);
            }
            catch (PDOException $e) {
                session()->setFlash(\FLASH::ERROR, "ID already exist !");
                return $this->sendPage('admins/Product', ['products' => Product::all()]);
            }
        }
    }
    public function FillProduct(){
        if($_POST['opt_type']=='All'){
            return $this->sendPage('admins/Product', ['products' => Product::all()]);
        }
        return $this->sendPage('admins/Product',['products'=>Product::where('ID_type',$_POST['opt_type'])->get(),
        'name_type'=>TypeProduct::where('ID_type',$_POST['opt_type'])->first()->name_type
        ]);
    }
    public function FillBill(){
        return $this->sendPage('admins/bill',['bills'=>Bill::where('date_time','like' ,'%'.$_POST["date"].'%')->get(),
        'date_time'=>Bill::where('date_time','like' ,'%'.$_POST["date"].'%')->first()->date_time
        ]);
    }
    public function User()
    {
        return $this->sendPage('admins/User', ['users' => User::all()]);
    }
}
