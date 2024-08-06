<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;
    public $subjectContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $subject)
    {
        $this->messageContent = $message;
        $this->subjectContent = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('dashboard.news-email')
                    ->with([
                        'messageContent' => $this->messageContent,
                        'subjectContent' => $this->subjectContent,
                    ])
                    ->subject($this->subjectContent);
    }
}
