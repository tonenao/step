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

    //問い合わせフォームから内容確認画面に遷移
    public function confirm(ContactRequest $request){
        $contact = $request->all();
        
        // 二重送信対策
        $request->session()->regenerateToken();

        return view('contact.confirm', $contact);
        }   
    

    //問い合わせ内容をメール送信処理
    public function complete(ContactRequest $request){

        $contact = $request->all();

        //戻るボタンを押した場合の処理
        if($request->action === 'back') {
            return redirect()->route('contact')->withInput($contact);
        }

        // 二重送信対策
        $request->session()->regenerateToken();

        //メール送信処理
        Mail::to('tonenao@gmail.com')->send(new Contact($contact));

        return view('contact.thanks', $contact);

    }
}
