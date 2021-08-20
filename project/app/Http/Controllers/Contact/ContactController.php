<?php

namespace App\Http\Controllers\Contact;

use App\Models\Contact;
use App\Models\WishList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Contact\ContactController;
use Mail;

class ContactController extends Controller
{
    public function index(){
        if (session()->get('customer')){
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.contact',compact('lists'));
        } else {
            return view('frontend.contact');
        }
    }

    public function saveContact(Request $request) { 

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
         ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('admin.mail',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'phone' => $request->get('phone'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('tularus94@gmail.com');
               });

               $alert='Your contact email has been sent!';
               return redirect()->back()->with('alert',$alert);   

        //   return back()->with('success', 'Thank you for contact us!');

    }
}
