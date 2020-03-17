<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Step;
use App\ChildStep;
use App\DoChildstep;

class DoChildStepController extends Controller
{
    public function create(Request $request){
        $u_id=Auth::id();
        $child_step_id=$request->child_step_id;
        $update=[
            'child_step_id'=>$child_step_id,
            'user_id'=>$u_id
        ];
        DoChildStep::create($update);
        return 'aaaaaa';
    }
}
