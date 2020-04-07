<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Log;

class ContactsController extends Controller
{
    public function index(){
        return view('contact.contact');
    }


    public function confirm(ContactRequest $request){
        $contact = $request->all();
        
        // 二重送信対策
        $request->session()->regenerateToken();

        return view('contact.confirm', $contact);
        }   
    

    public function complete(ContactRequest $request){
        // Log::debug($request);
        $contact = $request->all();
        // Log::debug($contact);
        if($request->action === 'back') {
            // Log::debug('back通った');
            return redirect()->route('contact')->withInput($contact);
        }

        // 二重送信対策
        $request->session()->regenerateToken();
        // Log::debug($contact);
        Mail::to('tonenao@gmail.com')->send(new Contact($contact));

        Log::debug($contact);
        return view('contact.thanks', $contact);

    }
}
