<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UpdateStaff extends Component
{

    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $user;

    public $state = [];

    public $photo;

    public function mount(User $user)
    {
        $this->state = $user->toArray();

        $this->user = $user;
    }


    public function updateUser()
    {

        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|confirmed',
            'address' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'phone' => 'required',
            'staff_id' => 'required',

        ])->validate();

        if (!empty($validatedData['password'])) {

            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        if ($this->photo) {
            $validatedData['profile_photo_path'] = $this->photo->store('/', 'admin_avatars');
        }

        $validatedData['user_role'] = '2';

        $this->user->update($validatedData);

        $this->dispatchBrowserEvent('alert', ['message' => 'Staff updated successfully!']);
    }


    public function render()
    {
        $departments = User::where('user_role', 1)->get();

        return view('livewire.admin.staff.update-staff', [
            'departments' => $departments,
        ]);
    }
}
