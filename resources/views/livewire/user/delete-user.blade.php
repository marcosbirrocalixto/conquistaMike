<div>
    <div class="mt-5 text-center">
        <p>Tem certeza que deseja deletar o usuário?</p>
        <p>Nome:  {{ $user->name }} </p>
        <p>E-mail:  {{ $user->email }} </p>
        <button wire:click="delete" class="px-4 py-2 m-5 font-bold text-white bg-red-500 rounded hover:bg-red-700">
            Deletar
        </button>
        <button wire:click="cancel" class="px-4 py-2 m-5 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
            Cancelar
        </button>
    </div>
</div>
