<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePlan extends Component
{
    #[Validate('required', message: 'O campo plano é obrigatório!')]
    #[Validate('min:3', message: 'O campo plano deve ter pelo menos 3 caracteres!')]
    #[Validate('max:100', message: 'O campo plano deve ter no máximo 100 caracteres!')]
    public $name = '';
    #[Validate('required', message: 'O campo descrição é obrigatório!')]
    #[Validate('min:3', message: 'O campo plano deve ter pelo menos 3 caracteres!')]
    #[Validate('max:190', message: 'O campo plano deve ter no máximo 190 caracteres!')]
    public $description = '';

    public function salvar()
    {
        $validatedData = $this->validate();

        //dd($this->description);

        try {
            $result = Plan::firstOrCreate(            
                ['name' => trim($this->name)], // Busca por e-mail
                [
                    'name' => trim($this->name),
                    'description' => trim($this->description),
                ]
            );

            //dd($result);

            if ($result->wasRecentlyCreated) {
                // Resetar campos do formulário
                $this->reset(['name', 'description']);

                $this->dispatch('plan-created');

                $this->dispatch(
                    'notification',
                    type: 'success',
                    message: 'Plano criado com sucesso!',
                    position: "top-end",
                    timer: 3000,
                );
            }
        } catch (\Exception $e) {
            //dd($e);
            $this->dispatch(
                'notification',
                type: 'error',
                message: 'Plano não foi criado!',
                position: "top-end",
                timer: 3000,
            );
        }
                
    }
    
    public function render()
    {
        return view('livewire.plan.create-plan');
    }
}
