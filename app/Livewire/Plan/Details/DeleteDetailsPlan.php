<?php

namespace App\Livewire\Plan\Details;

use App\Models\DetailsPlan;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeleteDetailsPlan extends Component
{
    public DetailsPlan $detailsPlan;
    public $id;

    public function mount($id)
    {
        //dd($id);
        $this->detailsPlan = DetailsPlan::with('plan')->findOrFail($this->id);

        //dd($this->user);
    }

    public function cancel()
    {
        $this->detailsPlan = DetailsPlan::with('plan')->findOrFail($this->id);
        //dd($this->detailsPlan->plan->id);
        $this->dispatch(
            'notification',
            type: 'success',
            message: 'Retorno ao início!',
            position: "top-end",
            timer: 10000,
        );
        return redirect()->route('details.index', ['id' => $this->detailsPlan->plan->id]);
    }

    public function delete()
    {
        $this->detailsPlan->delete();
        $this->dispatch(
            'notification',
            type: 'success',
            message: 'Plano deletado com sucesso!',
            position: "top-end",
            timer: 10000,
        );
        return redirect()->route('details.index', ['id' => $this->detailsPlan->plan->id]);
    }
    #[Title('Deletar Detalhes Plano')]    
    public function render()
    {
        return view('livewire.plan.details.delete-details-plan');
    }
}
