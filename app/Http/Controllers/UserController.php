<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id){
      return view('profdetail');
    }

    public function edit($id){
      return view('profedit');
    }

    public function update($id){
      return redirect('/mypage');
    }
}
