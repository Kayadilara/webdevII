<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function mail(Request $request)
    {
        Mail::to($request->email)->send(new ContactForm($request));
        return redirect()->back();
    }
}

?>
