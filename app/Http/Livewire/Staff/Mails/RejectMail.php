<?php

namespace App\Http\Livewire\Staff\Mails;

use App\Models\DeclinedMail;
use App\Models\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class RejectMail extends Component
{
    public $mails;

    public $mail;

    public $body;

    public function mount(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function rejectMail()
    {

        $validatedData = $this->validate(
            [

                'body' => 'required|min:10',

            ],
            [
                'body.required' => 'The decline reason field is required!'
            ]
        );


        $validatedData['mail_id'] = $this->mail->id;

        $validatedData['user_id'] = $this->mail->sender_id;

        DeclinedMail::create($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'Mail Declined !']);
    }

    public function render()
    {
        $this->mails = Mail::find($this->mail->id);

        return view('livewire.staff.mails.reject-mail');
    }
}
