<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPurchasedFilesMail extends Mailable
{
    use Queueable, SerializesModels;

    // l.v 2
    private $files;
    protected $user;

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
            subject: 'فروشگاه اینترنی فایل گرافیک شاپ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'emails.send_purchased_files_mail',
              with: [
                    'user' => $this->user->name,
                    'email' => $this->user->email,
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
                array_push($storage_files,storage_path('app/local_storage/'.$file));
            }
        }
        return $storage_files;

    }
}
