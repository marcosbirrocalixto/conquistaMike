<?php

namespace App\Livewire\Plan\Details;

use App\Exports\DetailsPlanExport;
use App\Models\DetailsPlan;
use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class DetailsPlanos extends Component
{
    public string $search = '';
    public int $detailsPlanPerPage = 10;
    //public $detailsPlan;
    public $plan;
    public $id;

    use WithPagination;
    
    #[On('detalsPlan-created')]
    public function updatedPlansList() 
    { 
        //$this->updateUsers();
    }

    public function export()
    {
        //dd('entrou');
        // $detailsPlanExcel = DetailsPlan::all();
        // return Excel::download(new DetailsPlanExport, 'detailsPlan.xlsx');
    }

    public function alteraPaginacao() 
    {
        $detailsPlan = DetailsPlan::orderBy('name')->paginate($this->detailsPlanPerPage);
    }

    public function mount($id)
    {

        //dd($id);

    }
    
    public function render()
    {
        //dd($this->id);
        $detailsPlan = null;
        $plan = null;
        //dd($this->id);
        $plan = Plan::where('id', $this->id)->first();
        $this->plan = $plan;
        //dd($this->plan);

        //$detailsPlan = null;

        if($this->search) {
            $detailsPlan = DetailsPlan::where('name', 'like', '%' . $this->search . '%')
                            ->orderBy('name')
                            ->paginate($this->detailsPlanPerPage);
        } else {
            $detailsPlan = DetailsPlan::orderBy('name')->paginate($this->detailsPlanPerPage);        
        }

        return view('livewire.plan.details.details-planos')->with(['plan' => $this->plan, 'detailsPlan' => $detailsPlan]);
    }
}
