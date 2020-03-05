<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class StepsController extends Controller
{
    public function top(){
        return view('top');
    }

    public function home(){
        $steps=Step::all();
        return view('home',['steps'=>$steps]);
    }

    public function mypage(){
        $steps=Step::all();
        return view('mypage',['steps'=>$steps]);
    }

    public function new(){
        return view('stepregist');
    }

    public function create(Request $request){
        
        return redirect('/mypage');
    }

    public function show($id){
        return view('stepdetail');
    }

    public function edit($id){
        return view('stepedit');
    }

    public function update($id){
        return redirect('/mypage');
    }
}
