<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateUser extends Component
{
    #[Validate('required', message: 'O campo nome é obrigatório!')]
    #[Validate('min:3', message: 'O campo nome deve ter pelo menos 3 caracteres!')]
    #[Validate('max:100', message: 'O campo nome deve ter no máximo 100 caracteres!')]
    public $name = '';
    #[Validate('required', message: 'O campo email é obrigatório!')]
    #[Validate('email', message: 'O campo email deve ter tipo email!')]
    #[Validate('unique:users,email', message: 'O campo email deve único na tabela de usuários!')]
    public $email = '';
    #[Validate('required', message: 'O campo senha é obrigatório!')]
    #[Validate('min:6', message: 'O campo senha deve ter pelo menos 6 caracteres!!')]
    #[Validate('max:12', message: 'O campo senha deve ter no máximo 12 caracteres!!')]
    #[Validate('confirmed', message: 'O campo senha e confirmação de senha não conferem!')]
    public $password = '';
    public $password_confirmation = '';

    // protected $rules = [
    //     'email' => 'required|email|unique:users,email',
    //     'password' => 'required|min:6|confirmed',
    // ];

    public function salvar()
    {
        $validatedData = $this->validate();

        try {
            $result = User::firstOrCreate(
                ['email' => trim($this->email)], // Busca por e-mail
                [
                    'name' => trim($this->name),
                    'password' => Hash::make(ltrim($this->password)),
                ]
            );

            if ($result->wasRecentlyCreated) {
                // Resetar campos do formulário
                $this->reset(['name', 'email', 'password', 'password_confirmation']);

                $this->dispatch('user-created');

                $this->dispatch(
                    'notification',
                    type: 'success',
                    message: 'Usuário criado com sucesso!',
                    position: "top-end",
                    timer: 3000,
                );
            }
        } catch (\Exception $e) {
            $this->dispatch(
                'notification',
                type: 'error',
                message: 'Usuário nã0 foi criado!',
                position: "top-end",
                timer: 3000,
            );
        }
                
    }

    public function render()
    {
        return view('livewire.user.create-user');
    }
}
