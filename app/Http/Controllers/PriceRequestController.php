<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PriceRequest;
use App\Product;
Use Session;

class PriceRequestController extends Controller
{
    public function requestPrice(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $pricereq = new PriceRequest;
            $pricereq->product_id = $data['inputProduct'];
            $pricereq->name = $data['inputName'];
            $pricereq->email = $data['inputEmail'];
            $pricereq->save();

            return redirect()->back()->with('flash_message_success', 'Your Request Have Been Sent Successfully!');
        }
    }

    public function view(){
        $requests = PriceRequest::with('product')->get();
        return view('admin.price-requests')->with(compact('requests'));
    }
}
