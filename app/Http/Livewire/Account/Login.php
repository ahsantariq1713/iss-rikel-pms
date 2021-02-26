<?php

namespace App\Http\Livewire\Account;

use App\Helpers\Swal;
use App\Models\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    use ThrottlesLogins;

    public $email, $password, $show = false, $remember = 0;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'remember' => 'boolean'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function toggleShow()
    {
        $this->show = !$this->show;
    }

    public function login()
    {
        $this->validate();

        //request attributes
        $request = request();
        $request->attributes->set('email', $this->email);

        //too many attempts
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutError();
            return null;
        }

        //find user, validate password challenge, check user is active
        $user = User::where('email', $this->email)->first();

        if (is_null($user) || $user->failPasswordChallenge($this->password)) {
            $this->incrementLoginAttempts($request);
            $this->sendFailedError();
            return null;
        }

        if ($user->status != 'Active') {
            $this->incrementLoginAttempts($request);
            $this->sendBlockedError();
            return null;
        }

        //login user
        Auth::login($user, $this->remember);

        $this->clearLoginAttempts($request);

        $redirect = '/';

        Swal::redirect($this, 'success', 'Login Successful!', 'You will be redirected to dashboard.', $redirect, false, 1500);
    }

    private function sendFailedError()
    {
        Swal::alert($this, 'error', 'Login Failed!', 'Invalid email or password');
    }

    private function sendBlockedError()
    {
        Swal::alert($this, 'error', 'Account Blocked!', 'Your account is temporarily blocked.');
    }

    private function sendLockoutError()
    {
        Swal::alert($this, 'error', 'Too Many Attempts!', 'You attempted too many times.');
    }

    public function username()
    {
        return 'email';
    }

    public function render()
    {
        return view('livewire.account.login')->layout('layouts.auth');
    }
}
