<?php

namespace App\Livewire\User;

use App\Exports\UsersExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Users extends Component
{
    public string $search = '';
    public int $usersPerPage = 10;

    use WithPagination;

    #[On('user-created')]
    public function updatedUsersList() 
    { 
        //$this->updateUsers();
    }
    
    // public function mount()
    // {
    //     //$users = User::all();
    //     $this->updateUsers();
    // }

    // private function updateUsers()
    // {
    //     $this->users = User::orderBy('name')->get();
    // }
  

    public function export()
    {
       
        // $usersExcel = User::all();
        // return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function gerarPdf()
    { 
        //dd('entrou');
        // $users = User::orderBy('name')->get()->map(function ($user) {
        //     $user->name = iconv('ISO-8859-1', 'UTF-8//IGNORE', $user->name);
        //     $user->email = iconv('ISO-8859-1', 'UTF-8//IGNORE', $user->email);
        //     return $user;
        // });

        //dd($users);
        // $pdf = Pdf::loadHTML('<h1>Teste de PDF com UTF-8: ãéíçô</h1>');
        // return $pdf->download('teste.pdf');


        // $pdf = Pdf::loadView('livewire.user.user-pdf', ['users' => $users]);

        // return $pdf->download('users.pdf');

    }

    public function alteraPaginacao() 
    {
        $users = User::orderBy('name')->paginate($this->usersPerPage);
    }
    
    public function render()
    {
        $users = null;

        if($this->search) {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%')
                            ->orderBy('name')
                            ->paginate($this->usersPerPage);
        } else {
            $users = User::orderBy('name')->paginate($this->usersPerPage);        
        }

        return view('livewire.user.users')->with('users', $users);
    }
}
