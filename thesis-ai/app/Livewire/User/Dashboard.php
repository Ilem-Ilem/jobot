<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $projects;
    public $message;

    public function mount()
    {
        $this->projects = Auth::user()->projects()->latest()->get();
        if (session()->has('message')) {
            $this->message = session('message');
        }
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
