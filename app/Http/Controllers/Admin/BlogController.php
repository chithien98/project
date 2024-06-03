<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function list()
    {
        $data=DB::table('blog')->get()->toArray();
        return view('admin/user/blog/list-blog', compact('data'));
    }

    public function add()
    {
        return view('admin/user/blog/add-blog');
    }

    public function insert(Request $request)
    {
        $data=DB::table('blog')->insert(
            [ 
                'title' => $request["title"],
                'image' => $request["image"],
                'description' => $request["description"],
                'content' => $request["content"]
            ]
        );

        echo "insert thanh cong";
        // VIET DONG CHUYEN TRANG 
             
    }

    public function edit($id)
    {
        $data = DB::table('blog')->where('id', $id)->get()->toArray();
        return view('admin/user/blog/edit-blog', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data = DB::table('blog')->where('id', $id)
                                    ->update([
                                        'title' => $request["title"],
                                        'image' => $request["image"],
                                        'description' => $request["description"],
                                        'content' => $request["content"]
                                    ]);
                                    
    }

    public function delete($id)
    {
        $data = DB::table('blog')->where('id', $id)->delete();

    }

}
