<?php

namespace App\Livewire;

use App\Notifications\NotificationBase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
