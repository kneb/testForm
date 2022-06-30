<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home');
    }

    public function add_complaint(Request $request){
        $this->validate($request, [
           'fio' => 'required|min:2|max:100',
           'id' => 'required|min:3|max:12',
           'text' => 'required|max:1000',
           'polyclinic' => 'required',
           'reason' => 'required'
        ]);
    }
}
