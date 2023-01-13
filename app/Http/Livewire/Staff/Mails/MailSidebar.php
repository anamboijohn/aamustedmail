<?php

namespace App\Http\Livewire\Staff\Mails;

use App\Models\Declinedmail;
use App\Models\Mail;
use Livewire\Component;

class MailSidebar extends Component
{
    public function render()
    {
        $inbox = Mail::where('receiver_id', auth()->user()->id)->count();

        $sent = Mail::where('sender_id', auth()->user()->id)->count();

        $declined = Declinedmail::where('user_id', auth()->user()->id)->count();

        return view('livewire.staff.mails.mail-sidebar', [
            'inbox' => $inbox,
            'sent' => $sent,
            'declined' => $declined,
        ]);
    }
}
