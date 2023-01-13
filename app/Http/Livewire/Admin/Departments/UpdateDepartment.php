<?php

namespace App\Http\Livewire\Admin\Departments;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UpdateDepartment extends Component
{

    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $department;

    public $state = [];

    public $photo;

    public function mount(User $department)
    {
        $this->state = $department->toArray();

        $this->department = $department;
    }


    public function updateDepartment()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:users,name,' . $this->department->id,
                'email' => 'required|email|unique:users,email,' . $this->department->id,
                'password' => 'sometimes|confirmed',

            ],
            [
                'name.required' => 'The Department name field is required!'
            ]
        )->validate();
        if (!empty($validatedData['password'])) {

            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        if ($this->photo) {
            $validatedData['profile_photo_path'] = $this->photo->store('/', 'admin_avatars');
        }

        $validatedData['user_role'] = '1';

        $this->department->update($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'Department updated successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.departments.update-department');
    }
}
