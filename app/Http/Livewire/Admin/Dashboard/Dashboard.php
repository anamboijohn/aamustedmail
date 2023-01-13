<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Conversation;
use App\Models\Mail;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{



    public function render()
    {
        $mails = Mail::all()->count();

        $users = User::where('user_role', 2)->count();

        $messages_count = Message::all()->count();

        $departments = User::where('user_role', 1)->count();

        return view('livewire.admin.dashboard.dashboard', [
            'mails' => $mails,
            'users' => $users,
            'departments' => $departments,
            'messages_count' => $messages_count,
        ]);
    }
}
