<div class="p-5 bg-gray-100 border border-gray-300 rounded-md card">

    <p class="pb-2 font-semibold">Listagem de Detalhes do Plano: {{ $plan->name }}</p>
    <hr>

    <div class="mt-2 mb-4 align-items-right">

        <form class="flex max-w-sm ml-auto items-right">


        <label for="simple-search" class="sr-only">Pesquisar</label>

        <div class="relative w-full">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                </svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquise pelo nome" required wire:model.live="search"/>
        </div>
        </form>
    </div>

    <div class="">
        <table class="w-full text-sm text-left text-gray-900 table-auto dark:text-gray-900 border border-gray-300 border-3 rounded p-2">
            <thead class="p-2">
                <tr class="p-2">
                    <th class="w-3/12 p-2">Nome</th>
                    <th class="w-2/12 p-2 text-right">Funções</th>
                </tr>
            </thead>
            <tbody class="text-sm text-left text-gray-500 dark:text-gray-400 p-2"> 
                {{-- @dd($detailsPlan);           --}}
                    @foreach ($detailsPlan as $detail)
                        <tr class="odd:bg-gray-200 even:bg-gray-100 p-2">
                            <td class="w-3/12 p-2">{{ $detail->name }}</td>

                            <td class="w-2/12 text-right p-2">
                                <div class="flex justify-end gap-2">
                                          <!-- Botão Editar -->
                                    <a href="{{ route('plans.edit', $detail->id) }}" title="Alterar registro">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </a>
                                <!-- Botão Excluir -->
                                <a href="{{ route('plans.delete', $detail->id) }}"  title="Excluir registro">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

            </tbody>
        </table>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-5 items-center card mt-4 border border-gray-300 border-3 rounded">
        <!-- Botão para exportar para Excel -->
        <div class="flex justify-start p-2">
            <img src="{{ asset('assets/images/excel-3-32.png') }}" title="Exporta detalhes do plano para Excel" class="size-8" wire:click="export()" style="cursor: pointer;">
            <img src="{{ asset('assets/images/pdf.png') }}" title="Relatório em PDF dos detalhes do plano" class="size-8 ml-7" wire:click="gerarPdf()" style="cursor: pointer;">
        </div>
        
        
        <!-- Campo de entrada -->
        <div class="flex justify-end items-center p-2">
            <label for="per_page" title="Após alterar a quantidade aperte a tecla TAB" class="mb-0 text-sm font-sm italic text-orange-700 dark:text-gray-300 rounded">
                Quantidade por página:
            </label>
            <input title="Após alterar a quantidade aperte a tecla TAB" class="w-2/12 px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-gray-300 rounded border-5 appearance-none focus:outline-none focus:bg-white focus:border-gray-300 ml-3 text-xs" 
            id="per_page" type="number" wire:model="detailsPlanPerPage" min="1" wire:blur="alteraPaginacao()">
     
        </div>

    </div>

    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-3 text-center">
            {{ session('success') }}
        </div>    
    @endif    

    {{-- <div class="card mt-4 border border-gray-300 border-3 p-2">
        @if (isset($detailsPlanPerPage))
            {!! $detailsPlan->appends($detailsPlanPerPage)->links() !!}
        @else
            {!! $detailsPlan->links() !!}
        @endif
    </div> --}}

    <script>
        window.addEventListener('notification', (event) => {
            let data = event.detail;             
            
            Swal.fire({
                title: data.title,
                text: data.message,
                icon: data.type,
                position: data.position,
                showConfirmButton: false,
                timer: 2000,
            })
        })

      </script>

</div>
