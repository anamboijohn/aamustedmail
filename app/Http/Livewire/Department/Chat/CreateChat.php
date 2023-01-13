<?php

namespace App\Http\Livewire\Department\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $detailDiv = true;
    public $showDeatail = false;
    public $users;
    public $message = 'hello how are you ';
    public $staff_name;
    public $staff_id;
    public $staff_email;
    public $staff_created_at;
    public $staff_image;

    public function checkconversation($receiverId)
    {

        // dd($receiverId);

        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $receiverId)->orWhere('receiver_id', $receiverId)->where('sender_id', auth()->user()->id)->get();


        if (count($checkedConversation) == 0) {

            // dd(no conversation);

            $createdConversation = Conversation::create(['receiver_id' => $receiverId, 'sender_id' => auth()->user()->id]);
            /// conversation created 

            $createdMessage = Message::create(['conversation_id' => $createdConversation->id, 'sender_id' => auth()->user()->id, 'receiver_id' => $receiverId, 'body' => $this->message]);


            $createdConversation->last_time_message = $createdMessage->created_at;
            $createdConversation->save();

            $this->dispatchBrowserEvent('alert', ['message' => 'Conversation added!']);
        } else if (count($checkedConversation) >= 1) {

            $this->dispatchBrowserEvent('warning', ['message' => 'Conversation exist!']);
        }
        # code...
    }

    public function contactDetail($id)
    {
        if ($this->showDeatail == true) {
            $this->showDeatail = false;
        } else {
            $this->showDeatail = true;
        }

        $details = User::find($id);
        $this->staff_id = $details->id;
        $this->staff_name = $details->name;
        $this->staff_email = $details->email;
        $this->staff_created_at = $details->created_at;
        $this->staff_image = $details->profile_photo_path;
    }

    public function exit()
    {
        $this->showDeatail = false;
    }

    public function render()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.department.chat.create-chat');
    }
}
