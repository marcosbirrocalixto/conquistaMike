<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPlan extends Component
{
    #[Validate('required', message: 'O campo plano é obrigatório!')]
    #[Validate('min:3', message: 'O campo plano deve ter pelo menos 3 caracteres!')]
    #[Validate('max:100', message: 'O campo plano deve ter no máximo 100 caracteres!')]
    public $name = '';
    #[Validate('required', message: 'O campo descrição é obrigatório!')]
    #[Validate('min:3', message: 'O campo plano deve ter pelo menos 3 caracteres!')]
    #[Validate('max:190', message: 'O campo plano deve ter no máximo 190 caracteres!')]
    public $description = '';

        protected function rules(): array {
        return [ 'name' => ['required', 'name', Rule::unique('plans', 'name')->ignore($this->plan)], ];
    }

    public Plan $plan;

    public function mount($id)
    {
        $this->plan = Plan::findOrFail($id);

        $this->name = $this->plan->name;
        $this->description = $this->plan->description;
    }

    public function updatePlan()
    {
        
        $this->validate();

        $plan = Plan::where('name', $this->name)
                    ->where('id', '!=', $this->plan->id)
                    ->first();

        if($plan) {
            session()->flash('error', 'Plano já cadastrado e sendo alterado com ID diferente.');
            return;
        }

        $result = $this->plan->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        if ($result) {
            $this->dispatch('plan-updated');
            $this->reset(['name', 'description']);

            $this->dispatch(
                'notification',
                type: 'success',
                message: 'Plano alterado com sucesso!',
                position: "top-end",
                timer: 10000,
            );

        } else {
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Alerta ao usuário!',
                text: 'Plano já existente! Não foi possível registrar o Plano.!',
                position: 'center'
            );
        }

        return redirect()->route('plan.index');
    }

    public function cancelar()
    {
        return redirect()->route('plan.index');
    }
    
    public function render()
    {
        return view('livewire.plan.edit-plan');
    }
}