<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Models\Admins;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageAdmin extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $admin;

    public $searchTerm = null;

    public $photo;

    protected $listeners = ['deleteConfirmed' => 'deleteAdmin'];

    public $adminIdBeingRemoved = null;

    public function confirmAdminRemoval($adminId)
    {
        $this->adminIdBeingRemoved = $adminId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAdmin()
    {
        $admin = User::findOrFail($this->adminIdBeingRemoved);

        $admin->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Admin deleted successfully!']);
    }


    public function render()
    {
        $admins = User::where('user_role', 0)
            ->Where('name', 'like', '%' . $this->searchTerm . '%')
            ->Where('email', 'like', '%' . $this->searchTerm . '%')

            ->latest()->paginate(10);

        return view('livewire.admin.admins.manage-admin', [
            'admins' => $admins,
        ]);
    }
}
