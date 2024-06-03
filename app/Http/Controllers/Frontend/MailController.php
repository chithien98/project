<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\MailNotify;
use App\Models\User;

class MailController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function getMail()
    {
        return view('frontend/member/checkout');
    }

    public function postMail(Request $request)
    {
        if(!Auth::check()){
           
            $data1 = $request->all();        
            $data1['level'] = 0;

            if(User::create($data1)){
                echo 'thanh cong';
            }else{
                echo 'that bai';
            }

        }


        $cart = session()->get('cart');
        $data = [
            'subject' => 'Cambo Tutorial Mail',
            'body' => $cart
        ];
        
        try {
                Mail::to('chithien98dn@gmail.com')->send(new MailNotify($data));
                return response()->json(['Great check your mail box']);
            } catch (Exception $th) {
                return response()->json(['sorry']);
            }

    }

   
}
