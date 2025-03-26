<div class="w-full text-left bg-gray-100  max-w-full overflow-hidden">

    <div class="text-blue-900 text-[18px] font-bold text-center mb-3 pt-4 italic  max-w-full">
        <div>Gestão de Planos
        <nav aria-label="breadcrumb" class="w-full ml-8">
            <ol class="flex w-full flex-wrap items-center rounded-md bg-slate-50 px-4 py-2">
              <li class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
                <a href="{{ route('dashboard') }}">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                  </svg>
                </a>
                <span class="pointer-events-none mx-2 text-slate-800">
                  /
                </span>
              </li>
              <li class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
                <a href="{{ route('plan.index') }}">Planos</a>
                <span class="pointer-events-none mx-2 text-slate-800">
                  /
                </span>
              </li>
            </ol>
          </nav>
        </div>
    </div>

    <div class="w-full grid grid-cols-12 gap-4 px-5 ">
        <!-- Formulário ocupando 4 colunas -->
        <div class="ml-7 w-full col-span-12 md:col-span-4 text-[14px] max-w-full">
            <livewire:plan.create-plan />
        </div>

        <!-- Tabela ocupando 8 colunas -->
        <div class="ml-7 mr-0 w-full col-span-12 md:col-span-7 text-[14px] max-w-full">
            <livewire:plan.plans />
        </div>
    </div>
</div>