<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    //
    public function store(Request $request)
    {
        $error = false;

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string'
        ]);

        // invalid IP
        if(substr_count($request->ip(), '.') <> 3) $error = 'Your client IP address is not allowed';
        
        else {
            // verify IP is legit
            $whois = Http::acceptJson()->get('https://ipwhois.app/json/' . $request->ip());

            // check for success
            if(empty($whois['success'])) $error = 'There was a problem verifying your client IP address';
        }

        $snackbar = (object) [
            'color' => 'success',
            'message' => 'Your message has been sent to Mike',
            'timeout' => 10000
        ];

        if($error) {
            $snackbar->color = 'error';
            $snackbar->message = $error;
        }

        return Redirect::route('home')->with('snackbar', $snackbar);
    }
}