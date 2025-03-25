<?php

namespace App\Livewire\User;

use Livewire\Attributes\Title;
use Livewire\Component;

class UserMainComponent extends Component
{
    #[Title('Gestão de Usuários')]
    public function render()
    {
        return view('livewire.user.user-main-component');
    }
}
