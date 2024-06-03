<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function detail(string $id)
    {
        $product = product::find($id);
        $image = json_decode($product->hinhanh);

        return view('frontend/member/account/detail-product', compact('product', 'image'));
    }

    // public function detail(Request $request, $id)
    // {
    //     // $request->session()->flush();
    //     $data = Product::where('id', $id)->get();
    //     return view('frontend/member/account/detail-product', compact('data'));
    // }

    public function list()
    {
        $data = product::orderBy('created_at', 'DESC')->paginate(6);
        // $data=DB::table('product')->get()->toArray();
        return view('frontend/member/account/my-product', compact('data'));
    }

    public function edit(string $id)
    {
        $data = Product::where('id', $id)->get();
        $category=DB::table('category')->get()->toArray();
        $brand=DB::table('brand')->get()->toArray();
        return view('frontend/member/account/edit-product', compact("data", "category", "brand"));
    }

    // public function update(Request $request, string $id)
    // {
    //     $user = Product::findOrFail($id);

    //     $data = $request->all();

    //     $file = $request->avatar;
    //     if(!empty($file)){
    //         $data['avatar'] = $file->getClientOriginalName();
    //     }

    //     if ($user->update($data)) {
    //         if(!empty($file)){
    //             $file->move('upload/user/avatar', $file->getClientOriginalName());
    //         }
    //         return redirect()->back()->with('success', __('Update profile success.'));
    //     } else {
    //         return redirect()->back()->withErrors('Update profile error.');
    //     }
    // }

    public function update(Request $request, $id)
    {
       $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_category = $request->category;
        $product->id_brand = $request->brand;
        $product->status = $request->status;
        $product->sale = $request->sale;
        $product->company = $request->company;
        $product->detail = $request->detail;

        $data = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $xx) {
                $image = Image::read($xx);

                $name = $xx->getClientOriginalName();
                $name_2 = "hinh50_".$xx->getClientOriginalName();
                $name_3 = "hinh100_".$xx->getClientOriginalName();

                //$image->move('upload/product/', $name);
                
                
                $path = public_path('upload/user/avatar/' . $name);
                $path2 = public_path('upload/user/avatar/' . $name_2);
                $path3 = public_path('upload/user/avatar/' . $name_3);

                $image->save($path);
                $image->resize(85, 84)->save($path2);
                $image->resize(329, 380)->save($path3);

            
                $data[] = $name;
            }
            $old_images = json_decode($product->hinhanh, true);
            $merged_images = array_merge($data, $old_images);
        } else {
            $merged_images = json_decode($product->hinhanh, true);
        }

        if ($request->has('delImage')) {
            $del_images = $request->input('delImage', []);
            $old_images = json_decode($product->image, true);

            foreach ($old_images as $key => $value) {

                if (in_array($value, $del_images)) {

                    unset($old_images[$key]);
                }
                $merged_images = $old_images;
            }
        }
        if (count($merged_images) > 3) {
            return back()->with('success', 'tối đa chỉ 3 hình ảnh');
        }

        $product->hinhanh = json_encode($merged_images);

        $product->save();
        return back()->with('success', 'Your Updated has been successfully');
    }


    public function add()
    {
        // $data = Product::where('id', $id)->get();
        $category=DB::table('category')->get()->toArray();
        $brand=DB::table('brand')->get()->toArray();

        $getProducts = Product::find(1)->toArray();

        $getArrImage = json_decode($getProducts['hinhanh'], true);

        return view('frontend/member/account/add-product', compact('getArrImage', 'category', 'brand'));
    }

    public function insert(Request $request)

    {
        $data = [];
        if($request->hasfile('hinhanh'))
        {
             foreach($request->file('hinhanh') as $xx)
            {
                $image = Image::read($xx);

                $name = $xx->getClientOriginalName();
                $name_2 = "hinh50_".$xx->getClientOriginalName();
                $name_3 = "hinh100_".$xx->getClientOriginalName();

                //$image->move('upload/product/', $name);
                
                
                $path = public_path('upload/user/avatar/' . $name);
                $path2 = public_path('upload/user/avatar/' . $name_2);
                $path3 = public_path('upload/user/avatar/' . $name_3);

                $image->save($path);
                $image->resize(85, 84)->save($path2);
                $image->resize(329, 380)->save($path3);
                
                // lấy từng tên hình ảnh đưa vào mảng
                $data[] = $name;
            }

        }

        $Product= new Product();
        $Product->id_user = Auth::id();
        $Product->name=$request->name;
        $Product->price=$request->price;
        $Product->id_category=$request->id_category;
        $Product->id_brand=$request->id_brand;
        $Product->status=$request->status;
        $Product->sale=$request->sale;
        $Product->company=$request->company;
        $Product->detail=$request->detail;
        $Product->hinhanh=json_encode($data);
        $Product->save();
        
        return back()->with('success', 'Your images has been successfully');
    }

    public function checkout()
    {
        return view('frontend/member/checkout');
    }

}
