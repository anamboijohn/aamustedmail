<?php

namespace App\Http\Livewire\Frontend\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;


    public function doLogin()
    {

        $this->validate(
            [
                'email' => 'required|exists:users,email',
                'password' => 'required|min:3|max:30',
            ],
            [
                'email.exists' => 'The email is not registered in this system.',
            ]
        );

        $user = Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

        if ($user) {
            if (Auth::user()->user_role == '0') {

                return redirect()->route('admin.dashboard')->with('success', 'You are logged in, Welcome to Dashboard!');
            } elseif (Auth::user()->user_role == '1') {

                return redirect()->route('department.dashboard')->with('success', 'You are logged in, Welcome to Dashboard!');
            } else {

                return redirect()->route('staff.dashboard')->with('success', 'You are logged in, Welcome to Dashboard!');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }

    public function render()
    {
        return view('livewire.frontend.auth.login')->layout('layouts.auth');
    }
}
