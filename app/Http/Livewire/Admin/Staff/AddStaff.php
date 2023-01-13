<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddStaff extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $state = [];

    public $photo;

    public function createUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'address' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'phone' => 'required',
            'staff_id' => 'required',

        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        if ($this->photo) {
            $validatedData['profile_photo_path'] = $this->photo->store('/', 'admin_avatars');
        }

        $validatedData['user_role'] = '2';

        User::create($validatedData);

        //session()->flash('message', 'User added successfullly!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Staff added successfully!']);
    }

    public function render()
    {
        $departments = User::where('user_role', 1)->get();
        return view('livewire.admin.staff.add-staff', [
            'departments' => $departments,
        ]);
    }
}
