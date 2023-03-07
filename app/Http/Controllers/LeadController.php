<?php

namespace App\Http\Controllers;

use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function create(){

        return view('guest.email.contactForm');

    }

    public function store(Request $request){

       
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);


        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('admin.email777@gmail.com')->send(new NewContact($newLead));

        return redirect()->route('guest.index');

    }
}
