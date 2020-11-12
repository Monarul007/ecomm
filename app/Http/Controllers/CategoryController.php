<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('post')){
            $slug = Str::slug($request->inputName);
            $slug_count = Category::where('url', $slug)->count();
            if($slug_count > 0){
                $x = Date('ms')."-".rand(1000,10000);
                $slug = $slug.$x;
            }
            $data = $request->all();
            $category = new Category;
            $category->name = $data['inputName'];
            $category->description = $data['InputDesc'];
            $category->url = $slug;
            $category->status = $data['inputStatus'];

            if($request->hasFile('inputImage')){
                $file = $request->file('inputImage');
                $basename = basename($file);
                $img_name = $basename.time().'.'.$file->getClientOriginalExtension();
                $file->move('images/categories/', $img_name);
                $category->image = $img_name;
            }

            $category->save();
            return redirect('/admin/create-category')->with('flash_message_success', 'Category Created Successfully!');
        }
        return view('admin.create-category');
    }

    public function index(){
        $categories = Category::get();
        return view('admin.view-categories')->with(compact('categories'));
    }

    public function edit(Request $req, $id = null){
        $category = Category::where('id',$id)->get();
        if($req->isMethod('post')){
            $data = $req->all();
            $slug = Str::slug($req->inputName);
            Category::where(['id'=>$id])->update(['name'=>$data['inputName'],'description'=>$data['InputDesc'],'status'=>$data['inputStatus'],'url'=>$slug]);
            $category = Category::find($id);
            if($req->hasFile('inputImage')){
                $prev_img = $category->image;
                $image_path = 'images/categories/'.$prev_img;  
                if(file_exists($image_path)) {
                    @unlink($image_path);
                }
                $file = $req->file('inputImage');
                $basename = basename($file);
                $img_name = $basename.time().'.'.$file->getClientOriginalExtension();
                $file->move('images/categories/', $img_name);
                $category->image = $img_name;
            }
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success', 'Category Updated Successfully!');
        }
        return view('admin.edit-category')->with(compact('category','id'));
    }

    public function delete($id)
    {
        $delete = Category::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Category deleted successfully!";
        } else {
            $success = true;
            $message = "Category not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
