<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    function sendEmail(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'asunto' => 'required|min:4',
            'mensaje'=> 'required|min:15',
            'recaptcha'=> 'required'
        ]);

        $correo= new ContactoMailable($request->all());

        Mail::to('codice@codice.com')->send($correo);
     
      return response()->json([
        'Mensaje' => '¡Correo enviado!']);
    }
}
