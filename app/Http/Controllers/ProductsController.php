<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Product;
Use Session;

class ProductsController extends Controller
{
    public function create(Request $request){
        $category = Category::orderBy('name', 'ASC')->get();

        if($request->isMethod('post')){

            $slug = Str::slug($request->inputName);
            $slug_count = Product::where('slug', $slug)->count();
            if($slug_count > 0){
                $x = Date('ms')."-".rand(1000,10000);
                $slug = $slug.$x;
            }
            $data = $request->all();
            $product = new Product;
            $product->cat_id = $data['inputCategory'];
            $product->product_name = $data['inputName'];
            $product->slug = $slug;
            $product->product_desc = $data['inputDescription'];
            $product->main_feature = $data['inputFeature'];
            $product->before_price = $data['inputPrice'];
            $product->product_code = $data['inputCode'];
            $product->is_featured = $data['inputStatus'];

            if($request->hasFile('inputImage')){
                $file = $request->file('inputImage');
                $basename = basename($file);
                $img_name = $basename.time().$file->getClientOriginalExtension();
                $file->move('images/products/', $img_name);
                $product->product_img = $img_name;
            }
            $product->save();

            return redirect('/admin/create-product')->with('flash_message_success', 'Product Created Successfully!');
        }

        return view('admin.create-product')->with('category', $category);
    }

    public function index(){
        $products = Product::orderBy('product_name', 'DESC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.view-products')->with('products', $products);
    }

    public function edit(Request $req, $id = null){
        $products = Product::where(['id'=>$id])->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        if($req->isMethod('post')){
            $data = $req->all();
            Product::where(['id'=>$id])->update(['cat_id'=>$data['inputCategory'],'product_name'=>$data['inputName'],'product_desc'=>$data['inputDescription'],'product_specs'=>$data['inputSpecs'],'before_price'=>$data['inputPrice'],'product_code'=>$data['inputCode'],'is_featured'=>$data['inputStatus']]);
            
            $product = Product::find($id);
            if($req->hasFile('inputImage')){
                $prev_img = $product->product_img;
                $image_path = 'images/products/'.$prev_img;
                if(file_exists($image_path)) {
                     @unlink($image_path);
                }
                $file = $req->file('inputImage');
                $basename = basename($file);
                $img_name = $basename.time().'.'.$file->getClientOriginalExtension();
                $file->move('images/products/', $img_name);
                $product->product_img = $img_name;
            }
            $product->save();
            return redirect('/admin/view-products')->with('flash_message_success', 'Product Updated Successfully!');
        }
        return view('admin.edit-product')->with(compact('products','categories','id'));
    }

    public function delete($id){
        $delete = Products::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Product deleted successfully!";
        } else {
            $success = true;
            $message = "Product not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function getProductData(Request $request){
        $id = $request->id;
        $get_data = Product::select('products.product_name','products.product_img','products.id')->where('id', $id)->first();
        $data = array(
            'id' => $id,
            'name' => $get_data->product_name, 
            'image' => $get_data->product_img,
        );
        return json_encode($data);
    }
}
