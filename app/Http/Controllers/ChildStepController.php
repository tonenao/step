<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ChildStep;


class ChildStepController extends Controller
{
    public function create(Request $request){
        $title=$request->title;
        $step_id=$request->step_id;
        $description=$request->description;
        $data=[
            'title'=>$title,
            'step_id'=>$step_id,
            'description'=>$description
        ];
        ChildStep::create($data);
    }

    public function update(Request $request,$id){
        $title=$request->title;
        $description=$request->description;
        $child_step=ChildStep::find($id);
        $update=[
            'title'=>$title,
            'description'=>$description
        ];
        $child_step->update($update);
    }
}
