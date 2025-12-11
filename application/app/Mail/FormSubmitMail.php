<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormSubmitMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $best_execution;
    public $custom_execution;
    public $message;

    public function __construct($first_name, $last_name, $email, $phone, $best_execution, $custom_execution, $message)
    {
        $this->first_name       = $first_name;
        $this->last_name        = $last_name;
        $this->email            = $email;
        $this->phone            = $phone;
        $this->best_execution   = $best_execution;
        $this->custom_execution = $custom_execution;
        $this->message          = $message;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config('services.mail.theme'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.form_submit',
            with: [
                'first_name'       => $this->first_name,
                'last_name'        => $this->last_name,
                'email'            => $this->email,
                'phone'            => $this->phone,
                'best_execution'   => $this->best_execution,
                'custom_execution' => $this->custom_execution,
                'message'          => $this->message,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
