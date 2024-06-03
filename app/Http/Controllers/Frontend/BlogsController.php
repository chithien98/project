<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Auth;
use App\Models\Rate;
use App\Models\Cmt;
use App\Models\User;

class BlogsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data=DB::table('blog')->get();
        return view('frontend/blog/blog-list', compact('data'));
    }

    public function detail($id)
    {
        $data = Blog::where('id', $id)->get();

        // get the current user
        $user = Blog::find($id);

        // get previous user id
        $previous = Blog::where('id', '<', $user->id)->max('id');
        
        // get next user id
        $next = Blog::where('id', '>', $user->id)->min('id');
        // dd($next);
        // exit;
        $rate= Rate::select('rate')->get();

        $cmt = Cmt::all();

        return view('frontend/blog/blog-detail', compact('data', 'next', 'previous', 'rate', 'cmt'));
    }

    public function rate(Request $request)
    {
        $data=new Rate();
        // dd($data);
        $data->rate=$request->rate;
        $data->id_blog=$request->id_blog;
        $data->id_user=$request->id_user;
        
        $data->save();

        echo "insert thanh cong";
             
    }

    public function cmt(Request $request)
    {
        $data=new Cmt();
        $blog=Blog::all();
        $data['level'] = $request->level;
        $data->cmt=$request->cmt;
        $data->id_blog=$blog[0]['id'];
        $data->id_user=Auth::user()->id;
        $data->avatar=$blog[0]['image'];
        $data->name=Auth::user()->name;       
        $data->save();

        echo "insert thanh cong";
    }

}
