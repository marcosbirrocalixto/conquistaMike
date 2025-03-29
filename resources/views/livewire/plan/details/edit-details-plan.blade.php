<div class="container px-4 py-4 mx-auto">
    <div class="p-5 bg-gray-100 border border-gray-400 rounded-md card">
        <p class="pb-2 ml-1 font-semibold">Edição do Detalhe do Plano: {{ $this->detailsPlan->plan->name }}</p>
        <hr>

        <form class="w-full"  wire:submit.prevent="updateDetailsPlan()">
            <!-- Nome -->
            {{-- <div class="flex items-center mb-6">
                <label class="w-1/6 pr-4 font-bold text-gray-500" for="inline-full-name">Nome</label>
                <div class="w-2/4">
                    <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none focus:outline-none focus:bg-white" id="inline-full-name" type="text" wire:model="name">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            <!-- E-mail -->
            <div class="flex items-center mb-6">
                <label class="w-1/6 pr-4 font-bold text-gray-500" for="email">Detalhe do Plano</label>
                <div class="w-2/4">
                    <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none focus:outline-none focus:bg-white" id="description" type="text" wire:model="name">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Botões -->
            <div class="flex items-center">
                <div class="w-1/6"></div>
                <div class="w-2/4">
                    <button class="px-4 py-2 font-bold text-white bg-red-500 rounded shadow hover:bg-red-400 focus:shadow-outline focus:outline-none" type="button" wire:click="cancelar()">
                        Cancelar
                    </button>
                    <button class="px-4 py-2 ml-4 font-bold text-white bg-blue-500 rounded shadow hover:bg-blue-400 focus:shadow-outline focus:outline-none" type="submit">
                        Atualizar
                    </button>
                </div>
            </div>
        </form>



        <script>
        window.addEventListener('notification', (event) => {
            let data = event.detail;

            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                confirmButtonText: 'Legal...',
                position: data.position,
                timer: 3000,
                showConfirmButton: true
            })

            // console.log(event);
        })
      </script>

    </div>
</div>
