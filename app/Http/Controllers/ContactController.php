<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{

  public function contact()
  {
    $title = 'Contact';
    $description = 'Nous contacter';
    $img = 'img/contact-bg.jpg';

    return view('front.contact', compact('title' , 'description' , 'img'));
  }

  public function mailToAdmin(ContactFormRequest $request)
	{
    Mail::to('administrateur@chezmoi.com')
        ->send(new Contact($request->except('_token')));

    // return view('confirm');
    return redirect()->route('contact')->with('message', ' votre email à bien été envoyé')->with('name', $request->name);
	}

}
