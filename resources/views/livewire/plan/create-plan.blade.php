<div class="p-5 bg-gray-100 border border-gray-300 rounded-md card max-w-full">
    <p class="pb-2 ml-1 font-semibold">Cadastro de Planos</p>
    <hr>
  
    <form class="w-full max-w-sm" wire:submit.prevent="salvar">
        <div class="mt-3 mb-6 md:flex md:items-center">
          <div class=" md:w-1/3">
            <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="name">Plano</label>
          </div>
          <div class="md:w-2/3">
            <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-gray-200 rounded appearance-none border-1 focus:outline-none focus:bg-white focus:border-grey-200" id="name" type="text" wire:model="name">
            @error('name')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>
  
        <div class="mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
              <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="email">Descrição</label>
            </div>
            <div class="md:w-2/3">
              <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-gray-200 rounded appearance-none border-1 focus:outline-none focus:bg-white focus:border-grey-200" id="email" type="text" wire:model="description">
              @error('description')
                <span class="text-xs text-red-500">{{ $message }}</span>
              @enderror
            </div>
        </div>
  

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded shadow hover:bg-blue-400 focus:shadow-outline focus:outline-none" type="submit">
                    Salvar
                </button>
                <div pl-1 wire:loading class="ml-1 pt-4">
                  <div role="status">
                      <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                      </svg>
                      <span class="sr-only">Salvando...</span>
                  </div>
              </div>
            </div>
        </div>
  
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
  
    </form>
  </div>
  