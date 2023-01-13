<?php

namespace App\Http\Livewire\Department\Dashboard;

use App\Models\Conversation;
use App\Models\Mail;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $mails = Mail::where('sender_id', auth()->user()->id)
            ->orWhere('receiver_id', auth()->user()->id)->count();

        $users = User::where('user_role', 2)->count();

        $messages_count = Message::all()->count();

        $conversations = Conversation::where('sender_id', auth()->user()->id)
            ->orWhere('receiver_id', auth()->user()->id)->count();

        return view('livewire.department.dashboard.dashboard', [
            'mails' => $mails,
            'users' => $users,
            'conversations' => $conversations,
            'messages_count' => $messages_count,
        ]);
    }
}
