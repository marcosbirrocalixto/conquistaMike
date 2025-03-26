<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeletePlan extends Component
{
    public Plan $plan;

    public function mount($id)
    {
        $this->plan = Plan::findOrFail($id);
        //dd($this->user);
    }

    public function cancel()
    {
        $this->dispatch(
            'notification',
            type: 'success',
            message: 'Retorno ao início!',
            position: "top-end",
            timer: 10000,
        );
        return redirect()->route('plan.index');
    }

    public function delete()
    {
        $this->plan->delete();
        $this->dispatch(
            'notification',
            type: 'success',
            message: 'Plano deletado com sucesso!',
            position: "top-end",
            timer: 10000,
        );
        return redirect()->route('plan.index');
    }
    #[Title('Deletar Plano')]
    public function render()
    {
        return view('livewire.plan.delete-plan');
    }}
