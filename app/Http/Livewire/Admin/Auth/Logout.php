<?php

namespace App\Http\Livewire\Admin\Auth;

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
        return view('livewire.admin.auth.logout');
    }
}
