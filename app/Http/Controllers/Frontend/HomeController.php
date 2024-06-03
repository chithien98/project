<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend/home/index');         
    }

    public function searchs()
    {
        return view('frontend/home/index');
    }

    public function handleSearch(Request $request)
    {
        $name = $request->input('name');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $category = $request->input('category');
        $brand = $request->input('brand');
        $status = $request->input('status');

        $products = Product::query();


        if ($name) {
            $products->where('name', 'like', '%' . $name . '%');
        }

        if ($minPrice && $maxPrice) {
            $products->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if ($category) {
            $products->where('category', $category);
        }

        if ($brand) {
            $products->where('brand', $brand);
        }

        if ($status) {
            $products->where('status', $status);
        }

        $products = $products->paginate(10);

        return view('frontend/member/search-advanced', compact('products'));
    }

    public function show()
    {
        // if(Auth::user()->level == 1){
        //     return view('admin/user/pages-profile');
        // }
        // if(Auth::user()->level == 0){
        //     return view('fontend/member/register');
        // }
    }
    
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        // dd($keywords);
        $search_product = DB::table('product')->where('name','like','%'.$keywords.'%')->get();
        // dd($search_product);
        return view('frontend/member/search',compact('search_product'));
    }

    public function add()
    {
        return view('frontend/member/register');
    }

    public function insert(Request $request)
    {
       
        $data = $request->all();
        

        $data['level'] = 0;

        // dd($data);
        // exit;

        if(User::create($data)){
            echo 'thanh cong';
        }else{
            echo 'that bai';
        }


    }


}
