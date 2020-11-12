<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Category;
use App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function navCats(){
        $navCats = Category::get();
        return $navCats;
    }

    public static function CatProducts(){
        $categories = Category::get();
        return $categories;
    }

    public static function products(){
        $products = Product::get();
        return $products;
    }
}
