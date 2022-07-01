<?php

namespace App\Http\Controllers;

use App\Polyclinic;
use App\Reason;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $polyclinics = new Polyclinic();
        $reasons = new Reason();
        return view('home', [
            'polyclinics' => $polyclinics->all(),
            'reasons' => $reasons->all()
        ]);
    }

    public function add_complaint(Request $request){
        $this->validate($request, [
           'fio' => 'required|min:2|max:100',
           'id' => 'required|min:3|max:12',
           'text' => 'required|max:1000',
           'polyclinic' => 'required',
           'reason' => 'required'
        ]);

        return redirect()->route("home");
    }
}
