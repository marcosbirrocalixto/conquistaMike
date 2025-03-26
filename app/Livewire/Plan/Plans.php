<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Plans extends Component
{
    public string $search = '';
    public int $plansPerPage = 10;

    use WithPagination;
    
    #[On('plan-created')]
    public function updatedPlansList() 
    { 
        //$this->updateUsers();
    }

    public function export()
    {
        //dd('entrou');
        // $plansExcel = Plan::all();
        // return Excel::download(new PlansExport, 'plans.xlsx');
    }

    public function alteraPaginacao() 
    {
        $plans = Plan::orderBy('name')->paginate($this->plansPerPage);
    }

    public function render()
    {
        $plans = null;

        if($this->search) {
            $plans = Plan::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                            ->orderBy('name')
                            ->paginate($this->plansPerPage);
        } else {
            $plans = Plan::orderBy('name')->paginate($this->plansPerPage);        
        }

        return view('livewire.plan.plans')->with('plans', $plans);
    }
}
