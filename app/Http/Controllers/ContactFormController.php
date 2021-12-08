<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendGrid;

class ContactFormController extends Controller
{
    //
    public function store(Request $request)
    {
        $error = false;

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
            'token' => 'required|string'
        ]);

        $snackbar = (object) [
            'color' => 'success',
            'message' => 'Your message has been sent!',
            'timeout' => 10000
        ];

        // invalid IP
        if(substr_count($request->ip(), '.') <> 3) $error = 'Your client IP address is not allowed';

        else {
            // verify IP is not suspicious
            $whois = Http::get(env('WHOIS_URL') . $request->ip());
            //$whois = Http::get('https://ipwhois.app/json/24.63.112.52');

            // no success
            if(empty($whois['success'])) $error = 'There was a problem verifying your client IP address';
        }

        // google recaptcha
        $recaptcha = Http::asForm()->post(env('RECAPTCHA_URL'), [
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $request->token
        ]);

        if(empty($recaptcha['success'])) $error = 'There was a problem verifying if you are a robot or not';

        if($recaptcha['success'] === false) {
            $error = 'It appears you are a robot!';
        }

        if($error) {
            $snackbar->color = 'error';
            $snackbar->message = $error;
        }

        else {
            $data = (object) [
                'message' => $request->message,
                'email' => $request->email,
                'name' => $request->name,
                'ip' => $whois['ip'],
                'region' => $whois['region'],
                'country' => $whois['country'],
                'isp' => $whois['isp'],
                'referer' => $_SERVER['HTTP_REFERER'],
                'url' => 'mailto:' . $request->email
            ];

            Mail::to($request->email)->send(new SendGrid($data));
        }

        return Redirect::route('home')->with('snackbar', $snackbar);
    }
}