<?php

namespace App\Livewire\Plan\Details;

use App\Models\DetailsPlan;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditDetailsPlan extends Component
{
    #[Validate('required', message: 'O campo Detalhe Plano é obrigatório!')]
    #[Validate('min:3', message: 'O campo Detalhe Plano deve ter pelo menos 3 caracteres!')]
    #[Validate('max:190', message: 'O campo Detalhe Plano deve ter no máximo 190 caracteres!')]
    public $name = '';
    public $id = '';
    public $planId = '';
    public $plan;

    protected function rules(): array {
    return [ 'name' => ['required', 'min:3', 'max:190', Rule::unique('details_plans', 'name')->ignore($this->name)], ];
    }

    public DetailsPlan $detailsPlan;

    public function mount($id)
    {
        //dd($id);
        $this->detailsPlan = DetailsPlan::with('plan')->findOrFail($id);
        //dd($this->detailsPlan->plan->name);
        $this->name = $this->detailsPlan->name;
    }

    public function updateDetailsPlan()
    {        
        //dd($this->id);
        $this->validate();
        //dd($this->id);
        $detailsPlan = DetailsPlan::where('id', $this->id)
                    ->first();

        $result = $this->detailsPlan->update([
            'name' => $this->name,
        ]);

        //dd($result);

        if ($result) {
            $this->dispatch('detailsPlan-Updated');
            $this->reset(['name']);

            $this->dispatch(
                'notification',
                type: 'success',
                message: 'Detalhe do Plano alterado com sucesso!',
                position: "top-end",
                timer: 10000,
            );

        } else {
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Alerta ao usuário!',
                text: 'Detalhe do Plano já existente! Não foi possível registrar o Detalhe do Plano!',
                position: 'center'
            );
        }

        return redirect()->route('details.index', ['id' => $this->id]);
    }

    public function cancelar()
    {
         return redirect()->route('details.index', ['id' => $this->id]);     
    }
    
    public function render()
    {
        return view('livewire.plan.details.edit-details-plan');
    }
}
