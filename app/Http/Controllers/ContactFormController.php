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

        $snackbar = (object) [
            'color' => 'success',
            'message' => 'Your message has been sent',
            'timeout' => 10000
        ];

        // invalid IP
        if(substr_count($request->ip(), '.') <> 3) $error = 'Your client IP address is not allowed';

        else {
            // verify IP is not suspicious
            $whois = Http::acceptJson()->get('https://ipwhois.app/json/' . $request->ip());

            // no success
            //if(empty($whois['success'])) $error = 'There was a problem verifying your client IP address';
        }

        if($error) {
            $snackbar->color = 'error';
            $snackbar->message = $error;
        }

        return Redirect::route('home')->with('snackbar', $snackbar);
    }
}