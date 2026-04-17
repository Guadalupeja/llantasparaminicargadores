<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MinicargadorLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo prospecto desde chat de minicargadores',
            replyTo: [
                new Address(
                    $this->lead['correo'],
                    $this->lead['nombre']
                ),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.minicargador-lead',
            with: [
                'lead' => $this->lead,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}