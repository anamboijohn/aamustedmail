<?php

namespace App\Http\Livewire\Admin\Departments;

use App\Models\Admins;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddDepartment extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $state = [];

    public $photo;

    public function addDepartment()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',

            ],
            [
                'name.required' => 'The Department name field is required!'
            ]
        )->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);
        if ($this->photo) {
            $validatedData['profile_photo_path'] = $this->photo->store('/', 'admin_avatars');
        }

        $validatedData['user_role'] = '1';

        User::create($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'New Department added successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.departments.add-department');
    }
}
