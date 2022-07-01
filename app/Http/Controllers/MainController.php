<?php

namespace App\Http\Controllers;

use App\Client;
use App\Complaint;
use App\Polyclinic;
use App\Reason;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $polyclinics = new Polyclinic();
        $reasons = new Reason();
        $complaints = Complaint::orderby('created_at', 'desc')->get();
        return view('home', [
            'polyclinics' => $polyclinics->all(),
            'reasons' => $reasons->all(),
            'complaints' => $complaints
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

        $clientExists = Client::where('id', $request['id'])->get()->count();
        if ($clientExists == 0){
            $newClient = new Client();
            $newClient->id = $request->input('id');
            $newClient->fio = $request->input('fio');
            $newClient->save();
        }

        $compl = new Complaint();
        $compl->client_id = $request->input('id');
        $compl->polyclinic_id = $request->input('polyclinic');
        $compl->reason_id = $request->input('reason');
        $compl->text = $request->input('text');
        $compl->save();

        return redirect()->route("home");
    }
}
