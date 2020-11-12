<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Product;
use App\Category;

class PagesController extends Controller
{
    public function details($url = null){
        $CatInfo = Category::where(['url' => $url])->first();
        $catId = $CatInfo->id;
        $categories = Category::with('categories')->get();
        $getProducts = Product::where('cat_id', $catId)->get();
        return view('details')->with(compact('CatInfo','categories','getProducts'));
    }

    public function home(){
        $categories = Category::get();
        $products = Product::get();
        return view('welcome')->with(compact('categories','products'));
    }

    public function contact(){
        return view('contact-us');
    }
}
