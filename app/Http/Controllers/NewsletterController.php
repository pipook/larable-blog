<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email'=> ['required', 'email']]);

        try{
            $response = $newsletter->subscribe(request('email'));
        }catch(\Exception){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email'=> 'This email could not be added to our newsletter list.'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
