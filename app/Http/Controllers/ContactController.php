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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string|max:256',
            //'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {

            $data['file'] = $request->file('file')->store('contacts');
        }

        try {
            Mail::to('contacto@britoacademy.com')->queue(new ContactMailable($data));
            session()->flash('flash.banner', 'El correo se envió satisfactoriamente.');
        } catch (\Exception $e) {
            session()->flash('flash.banner', 'Error al enviar el correo: ' . $e->getMessage());
        }

        return back();
    }



}
