<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallbackRequest;
use App\Http\Requests\FeedbackRequest;
use App\Mail\CallbackMail;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class BackController extends Controller
{
    public function feedback(FeedbackRequest $feedbackRequest)
    {
        if (env('MAIL_FROM_ADDRESS'))
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new FeedbackMail($feedbackRequest->only([
                'first_name',
                'last_name',
                'email',
                'message',
            ])));

        $feedbackRequest->session()->put('success', 'Сообщение отправлено');

        return Redirect::back();
    }

    public function callback(CallbackRequest $callbackRequest)
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new CallbackMail($callbackRequest->get('email')));

        $callbackRequest->session()->put('success', 'Сообщение отправлено');

        return Redirect::back();
    }
}
