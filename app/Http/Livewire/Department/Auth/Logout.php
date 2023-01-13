<?php

namespace App\Http\Livewire\Department\Auth;

use Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect(route('home'));
    }


    public function render()
    {
        return view('livewire.department.auth.logout');
    }
}
