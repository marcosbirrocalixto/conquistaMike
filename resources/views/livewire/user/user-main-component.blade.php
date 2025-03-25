<div class="w-full text-left bg-gray-100">
    <div class="text-blue-900 text-[18px] font-bold text-center mb-3 pt-4 italic">
        Gestão de usuários
    </div>

    <div class="w-full grid grid-cols-12 gap-4 px-5">
        <!-- Formulário ocupando 4 colunas -->
        <div class="ml-7 w-full col-span-12 md:col-span-4 text-[14px]">
            <livewire:user.create-user />
        </div>

        <!-- Tabela ocupando 8 colunas -->
        <div class="ml-7 mr-0 w-full col-span-12 md:col-span-7 text-[14px]">
            <livewire:user.users />
        </div>
    </div>
</div>


