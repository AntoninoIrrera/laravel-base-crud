<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('admin.email777@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
        ]);
    }
}
