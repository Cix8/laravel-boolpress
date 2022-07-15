<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $current_data = $request->all();

        $validator = Validator::make($current_data, [
            'name' => 'required',
            'email' => 'required|email',
            'request' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($current_data);
        $new_lead->save();

        $msg = new NewContactRequest($new_lead);
        Mail::to('admin@boolpress.com')->send($msg);

        return response()->json([
            'success' => true
        ]);
    }
}
