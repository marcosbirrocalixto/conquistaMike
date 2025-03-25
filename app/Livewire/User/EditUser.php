<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditUser extends Component
{
    #[Validate('required', message: 'O campo nome é obrigatório!')]
    #[Validate('min:3', message: 'O campo nome deve ter pelo menos 3 caracteres!')]
    #[Validate('max:100', message: 'O campo nome deve ter no máximo 100 caracteres!')]
    public $name = '';
    #[Validate('required', message: 'O campo email é obrigatório!')]
    #[Validate('email', message: 'O campo email deve ter tipo email!')]
    public $email = '';
    // #[Validate('required', message: 'O campo senha é obrigatório!')]
    // #[Validate('min:6', message: 'O campo senha deve ter pelo menos 6 caracteres!!')]
    // #[Validate('max:12', message: 'O campo senha deve ter no máximo 12 caracteres!!')]
    // #[Validate('confirmed', message: 'O campo senha e confirmação de senha não conferem!')]
    // public $password = '';
    // public $password_confirmation = '';

    protected function rules(): array {
        return [ 'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user)], ];
    }

    public User $user;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updateUser()
    {
        $this->validate();

        $user = User::where('email', $this->email)
                     ->where('name', $this->name)
                    ->where('id', '!=', $this->user->id)
                    ->first();

        if($user) {
            session()->flash('error', 'Usuário ja cadastrado e sendo alterado com ID diferente.');
            return;
        }

        $result = $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if ($result) {
            $this->reset(['name', 'email']);

            //$this->dispatch('user-created');

            $this->dispatch(
                'notification',
                type: 'success',
                message: 'Usuário criado com sucesso!',
                position: "top-end",
                timer: 10000,
            );

        } else {
            //$this->error = 'Usuário já existente! Não foi possível registrar o usuário.';

            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Alerta ao usuário!',
                text: 'Usuário já existente! Não foi possível registrar o usuário.!',
                position: 'center'
            );
        }

        return redirect()->route('user.index');
    }

    public function cancelar()
    {
        return redirect()->route('user.index');
    }
    
    public function render()
    {
        return view('livewire.user.edit-user');
    }
}
