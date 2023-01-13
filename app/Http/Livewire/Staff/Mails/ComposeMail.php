<?php

namespace App\Http\Livewire\Staff\Mails;

use App\Models\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ComposeMail extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';


    public $staffs;

    public $file;

    public $state = [
        'read' => 0,
    ];

    public function composeMail()
    {
        $validatedData = Validator::make(
            $this->state,
            [
                'receiver_id' => 'required',
                'subject' => 'required',
                'body' => 'required',
                'file' => 'mimes:png,jpg,svg,doc,docx,pdf,txt,zip,rar|max:10000'
            ],
            [
                'receiver_id.required' => 'The Receiver field is required!'
            ]
        )->validate();

        $validatedData['sender_id'] = auth()->user()->id;

        if ($this->file) {

            $validatedData['file'] = $this->file->store('/', 'uploads');
        }

        Mail::create($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'Mail Sent!']);
    }

    public function render()
    {
        $this->staffs = User::where('id', '!=', auth()->user()->id)
            ->where('user_role', 2)
            ->get();

        return view('livewire.staff.mails.compose-mail');
    }
}
