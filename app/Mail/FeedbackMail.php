<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $feedback;

    public function __construct(array $feedback)
    {
        $this->feedback = $feedback;
    }

    public function build()
    {
        return $this->markdown('Mails.feedback', [
            'feedback' => $this->feedback,
        ]);
    }
}
