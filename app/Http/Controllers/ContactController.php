<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function index(){
        return view('contacts.index');
    }

    public function store(Request $request){


        $request->validate([
            'name'=> 'required|string|max:20',
            'email'=> 'required|email',
            'message'=> 'required|string|max:256',
        ]);

        Mail::to('contacto@britoacademy.com')->send(new ContactMailable($request->all()));

        session()->flash('flash.banner', 'El correo se envio sastifsctoriamente');

        return back();

    }


}
