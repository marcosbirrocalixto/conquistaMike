<?php

namespace App\Livewire\Plan\Details;

use App\Models\DetailsPlan;
use App\Models\Plan;
use Livewire\Attributes\Title;
use Livewire\Component;

class MainComponentDetailsPlan extends Component
{
    public string $search = '';
    public int $detailsPlanPerPage = 10;
    public $detailsPlan = [];
    public $plan;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        //dd($this->id);
        //$plan = Plan::where('id', $this->id)->first();
        //dd($plan);

        //$detailsPlan = null;

        // if($this->search) {
        //     $detailsPlan = DetailsPlan::where('name', 'like', '%' . $this->search . '%')
        //                     ->orderBy('name')
        //                     ->paginate($this->detailsPlanPerPage);
        // } else {
        //     $detailsPlan = DetailsPlan::orderBy('name')->paginate($this->detailsPlanPerPage);        
        // }

    }

    #[Title('Gestão de Detalhes do Plano')]
    public function render()
    {
        return view('livewire.plan.details.main-component-details-plan', [
            'id' => $this->id
        ]);
    }
}

