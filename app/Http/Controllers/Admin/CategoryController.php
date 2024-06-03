<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('frontend/member/account/category/add-category');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function insertCategory(Request $request)
    {
        $data=DB::table('category')->insert(
            [ 
                'name' => $request["name"]
            ]
        );

        echo "insert thanh cong";         
    }

    public function removeCategory($id)
    {
        $data = DB::table('category')->where('id', $id)->delete();
    }

    public function listCategory()
    {
        $data=DB::table('category')->get()->toArray();
        return view('frontend/member/account/category/list-category', compact("data"));
    }


    public function addBrand()
    {
        return view('frontend/member/account/category/add-brand');
    }

    public function insertBrand(Request $request)
    {
        $data=DB::table('brand')->insert(
            [ 
                'name' => $request["name"]
            ]
        );

        echo "insert thanh cong";         
    }

    public function removeBrand($id)
    {
        $data = DB::table('brand')->where('id', $id)->delete();
    }

    public function listBrand()
    {
        $data=DB::table('brand')->get()->toArray();
        return view('frontend/member/account/category/list-brand', compact("data"));
    }
}
