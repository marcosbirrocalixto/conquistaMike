<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeleteUser extends Component
{
    public User $user;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        //dd($this->user);
    }

    public function cancel()
    {
        $this->dispatch(
            'notification',
            type: 'success',
            message: 'Usuário deletado com sucesso!',
            position: "top-end",
            timer: 10000,
        );
        return redirect()->route('user.index');
    }

    public function delete()
    {
        $this->user->delete();
        $this->dispatch(
            'notification',
            type: 'success',
            message: 'Usuário deletado com sucesso!',
            position: "top-end",
            timer: 10000,
        );
        return redirect()->route('user.index');
    }

    #[Title('Deletar usuário')]
    public function render()
    {
        return view('livewire.user.delete-user');
    }
}
