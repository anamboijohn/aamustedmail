<?php

namespace App\Http\Livewire\Staff\Mails;

use App\Models\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ReadMail extends Component
{
    public $mail_id;

    public $mails;

    protected $listeners = ['deleteConfirmed' => 'deleteMail'];

    public $mailIdBeingRemoved = null;

    public function mount($mail)
    {
        $this->mail_id = $mail;
    }

    public function download()
    {

        return Storage::disk('uploads')->download($this->mails->file);
    }

    public function markAllAsRead()
    {
        Mail::whereIn('id', $this->selectedRows)->update(['read' => 1]);

        $this->dispatchBrowserEvent('updated', ['message' => 'Selected Mails Marked as Read!']);

        $this->reset(['selectPageRows', 'selectedRows']);
    }

     public function markAsRead($id)
    {
        Mail::where('id', $id)->update(['read' => 1]);

        $this->dispatchBrowserEvent('alert', ['message' => 'Mail Marked as Read!']);

    }

    public function confirmMailRemoval($mailId)
    {
        $this->mailIdBeingRemoved = $mailId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteMail()
    {
        $mailD = Mail::findOrFail($this->mailIdBeingRemoved);

        $mailD->delete();

        return redirect()->route('staff.mail-inbox')->with('success', 'Mail deleted successfully!');

        $this->dispatchBrowserEvent('deleted', ['message' => 'Mail deleted successfully!']);
    }

    public function render()
    {
        $this->mails = Mail::find($this->mail_id);
        return view('livewire.staff.mails.read-mail');
    }
}
