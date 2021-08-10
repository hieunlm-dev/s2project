<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Contact\ContactController;
class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }
}
