<?php

namespace App\Http\Livewire\Department\Auth;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;


    public function doLogin()
    {

        $this->validate(
            [
                'email' => 'required|exists:departments,email',
                'password' => 'required|min:3|max:30',
            ],
            [
                'email.exists' => 'The email is not registered in this system.',
            ]
        );

        if (Auth::guard('department')->attempt(['email' => $this->email, 'password' => $this->password])) {

            return redirect()->route('department.dashboard')->with('success', 'You are logged in, Welcome to Dashboard!');
        } else {

            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }

    public function render()
    {
        return view('livewire.department.auth.login')->layout('layouts.auth');
    }
}
