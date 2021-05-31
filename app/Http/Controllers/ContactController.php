<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function send(Request $request)
    {
        $message = 'message sent sucessfully';

        try {
            $user = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message
            ]);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            // $message = 'error sending your message,please retry';
        }

        return back()->with('message', $message);
    }
}
