<?php

namespace App\Livewire\Plan;

use Livewire\Attributes\Title;
use Livewire\Component;

class PlanMainComponent extends Component
{    
    #[Title('Gestão de Planos')]
    public function render()
    {
        return view('livewire.plan.plan-main-component');
    }
}
