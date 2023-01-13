<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageStaff extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteConfirmed' => 'deleteUser'];

    public $user;

    public $userIdBeingRemoved = null;

    public $searchTerm = null;

    public $photo;


    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteUser()
    {
        $user = User::findorfail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);
    }

    public function render()
    {
        if (auth()->user()->user_role == 0) {
            # code...
             $users = User::where('user_role', 2)
            ->Where('name', 'like', '%' . $this->searchTerm . '%')
            ->Where('email', 'like', '%' . $this->searchTerm . '%')
            ->latest()->paginate(10);

        }
        else{

          $users = User::where('user_role', 2)
        ->where('department', auth()->user()->name)
            ->Where('name', 'like', '%' . $this->searchTerm . '%')
            ->Where('email', 'like', '%' . $this->searchTerm . '%')
            ->latest()->paginate(10);
            
        }
       
        return view('livewire.admin.staff.manage-staff', [
            'users' => $users
        ]);
    }
}
