<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data=DB::table('country')->get()->toArray();
        return view('admin/user/country/list-country', compact("data"));
    }

    public function add()
    {
        return view('admin/user/country/add-country');
    }

    public function insert(Request $request)
    {
        $data=DB::table('country')->insert(
            [ 
                'name' => $request["name"]
            ]
        );

        echo "insert thanh cong";         
    }

    public function delete($id)
    {
        $data = DB::table('country')->where('id', $id)->delete();
    }

}
