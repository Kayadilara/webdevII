<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function mail($contact)
    {
        Mail::to($contact->user->email)->send(new ContactForm($contact));
    }
}

?>
