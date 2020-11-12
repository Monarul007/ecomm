<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactRequest;

class ContactRequestController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $pricereq = new ContactRequest;
            $pricereq->message = $data['description'];
            $pricereq->phone = $data['S_mobile'];
            $pricereq->name = $data['fullname'];
            // $pricereq->email = $data['email'];
            $pricereq->save();

            return redirect()->back()->with('flash_message_success', 'Your Request Have Been Sent Successfully!');
        }
    }

    public function view(){
        $requests = ContactRequest::get();
        return view('admin.contact-requests')->with(compact('requests'));
    }
}
