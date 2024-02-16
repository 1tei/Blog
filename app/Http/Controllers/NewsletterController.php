<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['newsletterEmail' => ['required', 'email']]);

        try {
            $newsletter->subscribe(request('newsletterEmail'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'newsletterEmail' => 'This email could not be added to our newsletter list'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
