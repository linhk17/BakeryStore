<?php

namespace App\Controllers;

use App\Models;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use PDOException;

class CartController extends BaseController
{
    public function Cart()
    {
        if (!auth()) {
            $product = Product::where('ID_type','L01')->limit(6)->get();
            return $this->sendPage('home/index',['products'=>$product]);
        }
        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
        $data = ['carts' => CartDetail::join('products', 'products.ID_product', '=', 'cart_detail.ID_product')->where('ID_cart', $ma_gh)->get()];
        $this->sendPage('products/cart', $data);
    }

    public function addCart()
    {
        if (!auth()) {
            return $this->sendPage('auth/Signin');
        }

        $soluongmua = 1;
        $masp = $_GET['ID_product'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masp = $_POST['ID_product'];
            $soluongmua = $_POST['soluong'];
        }

        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
        try {
            CartDetail::create([
                'ID_cart' => $ma_gh,
                'ID_product' => $masp,
                'quanlity' => $soluongmua
            ]);
            session()->setFlash(\FLASH::SUCCESS, "Add To Cart Successfully !");
        } catch (PDOException $pe) {
            $so_luong = CartDetail::where('ID_product', $masp)->where('ID_cart', $ma_gh)->first()->quanlity;
            CartDetail::where('ID_product', $masp)->where('ID_cart', $ma_gh)->update([
                'quanlity' => ($so_luong + $soluongmua)
            ]);
        }
        
        redirect('/cart');
    }
    public function deleteCart()
    {

        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
        CartDetail::where('ID_cart', $ma_gh)->where('ID_product', $_GET['delete'])->delete();
        redirect('/cart');
    }
    public function pay(){
        $ma_gh = Cart::join('users','users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ID_cart;
        $carts = CartDetail::where('ID_cart',$ma_gh)->get();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $bill = Bill::create(
                [
                  'full_name' => $_POST['name'],
                  'number_phone' => $_POST['sdt'],
                  'address' => $_POST['address'],
                  'ID_user' =>  User::where('username', auth()->username)->first()->ID_user,
                  'date_time' => Date::now(),
                  'total' => $_POST['tongtien'],
                  'status_bill' => 'Đang xác nhận',
                  'status_pay' => 'Chưa thanh toán'
                ]
            );
           
            foreach($carts as $cart){
                BillDetail::create(
                    [
                        'ID_bill' => $bill->ID_bill,
                        'ID_product' => $cart->ID_product,
                        'quanlity' => $cart ->quanlity,
                        'note' => $_POST['note']
                    ]
                    );
                CartDetail::where('ID_product', $cart->ID_product)->where('ID_cart',$ma_gh)->delete();    
            }
            session()->setFlash(\FLASH::SUCCESS, "Successfully !");
            redirect('/cart');
        }
    }
    public function Bill(){
        return $this->sendPage('products/bill',
        ['bills_user'=>
        Bill::where('ID_user',User::where('username', auth()->username)
        ->first()->ID_user)->get()]);
    }
    public function BillDetail(){
        return $this->sendPage('products/billdetail',
        ['bill_detail'=>BillDetail::join('products','products.ID_product','=', 'bill_detail.ID_product')->
        where('ID_bill',$_GET['detail'])->get()]);
        
    }
    public function FillBill(){
        return $this->sendPage('products/bill',['bills_user'=>Bill::where('date_time','like' ,'%'.$_POST["date"].'%')->get(),
        'date_time'=>Bill::where('date_time','like' ,'%'.$_POST["date"].'%')->first()->date_time
        ]);
    }






   
}
