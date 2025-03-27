<?php

namespace App\Livewire\Plan\Details;

use App\Models\DetailsPlan;
use App\Models\Plan;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateDetailsPlan extends Component
{
    public $id;

    #[Validate('required', message: 'O campo plano é obrigatório!')]
    #[Validate('min:3', message: 'O campo plano deve ter pelo menos 3 caracteres!')]
    #[Validate('max:100', message: 'O campo plano deve ter no máximo 100 caracteres!')]
    public $name = '';
    public $plan_id = '';

    public function salvar()
    {
        $validatedData = $this->validate();

        //$plan_id = $this->id;

        try {
            $result = DetailsPlan::firstOrCreate(            
                ['name' => trim($this->name)], // Busca por e-mail
                [
                    'plan_id' => trim($this->id),
                    'name' => trim($this->name),
                ]
            );

            //dd($result);

            if ($result->wasRecentlyCreated) {
                // Resetar campos do formulário
                $this->reset(['plan_id', 'name']);

                $this->dispatch('detailsPlan-created');

                $this->dispatch(
                    'notification',
                    type: 'success',
                    message: 'Detalhes do Plano criado com sucesso!',
                    position: "top-end",
                    timer: 3000,
                );
            }
        } catch (\Exception $e) {
            dd($e);
            $this->dispatch(
                'notification',
                type: 'error',
                message: 'Detalhes do Plano não foi criado!',
                position: "top-end",
                timer: 3000,
            );
        }

        return redirect()->route('details.index', $this->id);
                
    }

    public function mount($id)
    {
        
        //dd($plan);
    }

    public function render()
    {
        $plan = null;

        $plan = Plan::where('id', $this->id)->first();
        //dd($plan);

        return view('livewire.plan.details.create-details-plan')->with('plan', $plan);
    }
}

