<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPurchasedfilesMail extends Mailable
{
    use Queueable, SerializesModels;

    // l.v 2
    private $files;
    public $user;

    /**
     * Create a new message instance.
     * @param array $purchasedfiles
     * @param $user
     */
    public function __construct(array $purchasedfiles = [], $user)
    {
        // l.v 3
        $this->files = $purchasedfiles;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Purchased files Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.send_purchased_files_mail.blade',
              with: [
                    'user' => $this->user->name,
                    'email' => $this->user->emal,
                ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // l.v 4
        $storage_files = [];
        if($this->files){
            foreach ($this->files as $file){
                array_push($file,storage_path('storage/app/local_storage/'.$file));
            }
        }
        return $storage_files;

    }
}
