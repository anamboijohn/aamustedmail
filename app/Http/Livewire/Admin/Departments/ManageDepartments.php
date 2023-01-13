<?php

namespace App\Http\Livewire\Admin\Departments;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageDepartments extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $department;

    public $searchTerm = null;

    public $photo;

    protected $listeners = ['deleteConfirmed' => 'deleteDepartment'];

    public $departmentIdBeingRemoved = null;

    public function confirmDepartmentRemoval($departmentId)
    {
        $this->departmentIdBeingRemoved = $departmentId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteDepartment()
    {
        $department = User::findOrFail($this->departmentIdBeingRemoved);

        $department->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Department deleted successfully!']);
    }


    public function render()
    {
        $departments =
            User::where('user_role', 1)
            ->Where('name', 'like', '%' . $this->searchTerm . '%')
            ->Where('email', 'like', '%' . $this->searchTerm . '%')

            ->latest()->paginate(10);

        return view('livewire.admin.departments.manage-departments', [
            'departments' => $departments,
        ]);
    }
}
