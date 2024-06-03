<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ajax(Request $request)
    {        
        $id = $request->cart;
        $data = Product::find($id)->toArray();
        // $data = $data[0];
        // dd($data);
        $data['qty'] = 1;

        if($data){
            $cart = session()->get('cart');
            $x = true;

            if($cart){
                foreach ($cart as $key => $value) {
                    if($value['id']==$id){
                        $cart[$key]['qty']+=1;
                        session()->put('cart',$cart);
                        $x = false;
                        break;
                    }
                }
            }else{
                $data['qty'] = 1;
            }
                     
            if($x){
                // $data['qty'] = 1;
                session()->push('cart',$data);
            }

            
            // dd($data);
        }
        // $testing = session()->get('cart');
        // dd($testing);


        // session()->push('cart',$data);
        // [
        //     0: [
        //     ],
        //    
        // ]

        // $testing = session()->get('cart');
        // var_dump($testing);


        // session()->has('cart'): kiem tra có Ss K?
        // session()->get('cart'); lấy ra
        // session()->put('cart',$getSession);: update
        // session()->push('cart',$array); đưa 1 mảng vào SS

    }

    /**
     * Show the form for creating a new resource.
     */

    public function up(Request $request)
    {
        $id = $request->up;

        $cart = session()->get('cart');
        // dd($cart);

        if($cart){
            foreach ($cart as $key => $value) {
                if($id==$value['id']){
                    $cart[$key]['qty']+=1;
                    session()->put('cart',$cart);   
                }
            }
            // $testing = session()->get('cart');
            // dd($testing);
        }

    }

    public function down(Request $request)
    {
        $id = $request->down;
        // dd($id);
        $cart = session()->get('cart');
        // dd($cart);

        if($cart){
            foreach ($cart as $key => $value) {
                if($id==$value['id']){
                    $cart[$key]['qty']-=1;
                    session()->put('cart',$cart);   
                }
                if($cart[$key]['qty']<1){
                    unset($cart[$key]);
                    session()->put('cart',$cart);
                }

            }
            // $testing = session()->get('cart');
            // dd($testing);
        }

    }

    public function delete(Request $request)
    {
        $id = $request->delete;

        $cart = session()->get('cart');
        // dd($cart);

        if($cart){
            foreach ($cart as $key => $value) {
                if($id==$value['id']){
                    unset($cart[$key]);
                    session()->put('cart',$cart);   
                }

            }
            // $testing = session()->get('cart');
            // dd($testing);
        }

    }

    public function cart(Request $request)
    {
        return view('frontend/member/cart');
    }
    
}
