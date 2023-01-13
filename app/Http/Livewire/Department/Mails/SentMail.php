<?php

namespace App\Http\Livewire\Department\Mails;

use App\Models\Mail;
use Livewire\Component;

class SentMail extends Component
{
    public $auth_id;

    public $mails;

    protected $listeners = ['deleteConfirmed' => 'deleteMail'];

    public $mailIdBeingRemoved = null;

    public $status = null;

    protected $queryString = ['status'];

    public $selectedRows = [];

    public $selectPageRows = false;

    public function confirmMailRemoval($mailId)
    {
        $this->mailIdBeingRemoved = $mailId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteMail()
    {
        $mail = Mail::findOrFail($this->mailIdBeingRemoved);

        $mail->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Mail deleted successfully!']);
    }

    public function filterMailsByStatus($status = null)
    {
        $this->resetPage();

        $this->status = $status;
    }

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->mails->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function deleteSelectedRows()
    {
        Mail::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Selected Mail deleted!']);

        $this->reset(['selectPageRows', 'selectedRows']);
    }

    public function markAllAsRead()
    {
        Mail::whereIn('id', $this->selectedRows)->update(['read' => 1]);

        $this->dispatchBrowserEvent('updated', ['message' => 'Selected Mails Marked as Read!']);

        $this->reset(['selectPageRows', 'selectedRows']);
    }

    public function mount()
    {

        $this->auth_id = auth()->id();
        $this->mails = Mail::where('sender_id', $this->auth_id)->orderBy('created_at', 'DESC')->get();

        # code...
    }

    public function render()
    {
        return view('livewire.department.mails.sent-mail');
    }
}
