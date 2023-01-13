<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Models\Admins;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddAdmin extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $state = [];

    public $photo;

    public function addAdmin()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',

            ],
            [
                'name.required' => 'The Admin name field is required!'
            ]
        )->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);
        if ($this->photo) {
            $validatedData['profile_photo_path'] = $this->photo->store('/', 'admin_avatars');
        }

        $validatedData['user_role'] = '0';

        User::create($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'New Admin added successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.admins.add-admin');
    }
}
