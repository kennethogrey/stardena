<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Livewire\Home\SessionComponent;
use App\Models\Contact;

class MessageComponent extends Component
{
    use SessionComponent;
    public $message;

    
    #[\Livewire\Attributes\On('show')]
    public function show($messageId): void
    {
        $this->message = Contact::find($messageId);
        if(!$this->message){
            session()->flash('warning', 'Message Not Available');
        }else {
            $this->js('openMessage('.$this->message.')');
        }
    }

    public function deleteMessageNow($messageId): void
    {
        try {
            $message = Contact::find($messageId);

            if ($message) {
                $message->delete();
                session()->flash('success', 'Message Deleted Successfully');
                $this->js('refreshPage()');
            } else {
                session()->flash('danger', 'Message Not Available');
            }
        } catch (\Exception $e) {
            session()->flash('danger', 'An error occurred while deleting the message');
        }
    }


    #[\Livewire\Attributes\On('deleteMessage')]
    public function deleteMessage($messageId): void
    {
        $this->message = Contact::find(($messageId));
        if(!$this->message){
            session()->flash('warning', 'Message/Feedback Not Available');
        }else {
            $this->js('confirmDeleteMessage('.$this->message.')');
        }
    }

    public function readingFinished($messageId):void 
    {
        $read_message = Contact::find(($messageId));
        if($read_message){
            $read_message->update([
                'status' => 1
            ]);
            $this->js('refreshPage()');
            session()->flash('success', 'Message Marked Read');
        }else {
            session()->flash('danger', 'Message Does not Exist');
        }
    }
    public function render()
    {
        return view('livewire.home.message-component');
    }
}
