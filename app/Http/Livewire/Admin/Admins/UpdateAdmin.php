<?php

namespace App\Http\Livewire\Admin\Admins;

use Admin;
use App\Models\Admins;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UpdateAdmin extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $admin;

    public $state = [];

    public $photo;

    public function mount(User $admin)
    {
        $this->state = $admin->toArray();

        $this->admin = $admin;
    }


    public function updateAdmin()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $this->admin->id,
                'password' => 'sometimes|confirmed',

            ],
            [
                'name.required' => 'The Admin name field is required!'
            ]
        )->validate();
        if (!empty($validatedData['password'])) {

            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        if ($this->photo) {
            $validatedData['profile_photo_path'] = $this->photo->store('/', 'admin_avatars');
        }

        $validatedData['user_role'] = '0';

        $this->admin->update($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'Admin updated successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.admins.update-admin')->layout('layouts.app');
    }
}
