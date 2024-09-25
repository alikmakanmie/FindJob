<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $question;
    public $answer;

    public function __construct($user, $question, $answer)
    {
        $this->user = $user;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function build()
    {
        return $this->subject('Jawaban Baru untuk Pertanyaan Anda')
                    ->view('emails.answer-notification');
    }
}
