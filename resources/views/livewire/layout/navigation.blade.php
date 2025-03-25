<nav x-data="{ open: false }" class="w-full bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" style="margin-right: 10px;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-4 ml-8">
        <div class="flex justify-between h-16">
            <!-- Esquerda: Logo e Navegação -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard.index') }}" wire:navigate>
                        <img src="{{ asset('assets/images/Logo-sem-fundo.webp') }}" alt="Logo" class="h-10">
                    </a>
                </div>

                <!-- Links de Navegação -->
                <div class="hidden space-x-8 sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" wire:navigate>
                        {{ __('Usuários') }}
                    </x-nav-link>

                    <!-- Dropdown Clientes -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium leading-5 rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 pt-6">
                                <span>{{ __('Clientes/OSs') }}</span>
                                <div class="ml-2">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('clientes.index')" wire:navigate>{{ __('Clientes') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('veiculos.index')" wire:navigate>{{ __('Veículos') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('cenarios.index')" wire:navigate>{{ __('Cenários') }}</x-dropdown-link>
                            <!-- <x-dropdown-link :href="route('user.index')" wire:navigate>{{ __('Usuários') }}</x-dropdown-link> -->
                            <!-- <x-dropdown-link :href="route('clientesImport.index')" wire:navigate>{{ __('CRiar Veículo para usuários') }}</x-dropdown-link> -->
                        </x-slot>
                    </x-dropdown>

                    <!-- Dropdown Clientes -->
                    <!-- <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium leading-5 rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 pt-6">
                                <span>{{ __('Ajustes') }}</span>
                                <div class="ml-2">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('importClienteTemp.index')" wire:navigate>{{ __('Importa clientes Temporários') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('AcompTempImport.index')" wire:navigate>{{ __('Importa Acompanhamentpo temporário') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('ClientesOs.index')" wire:navigate>{{ __('Grid Cliente/Acompanhamentos') }}</x-dropdown-link>
                        </x-slot>
                    </x-dropdown> -->

                    <!-- Dropdown Tabelas Auxiliares -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center border border-transparent text-sm font-medium leading-5 rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 pt-6">
                                <span>{{ __('Tabelas Auxiliares') }}</span>
                                <div class="ml-2">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('plan.index')" wire:navigate>{{ __('Planos') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('tipopessoas.index')" wire:navigate>{{ __('Tipo Pessoas') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('tipologradouros.index')" wire:navigate>{{ __('Tipo Logradouro') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('tiposervicos.index')" wire:navigate>{{ __('Tipo Serviços') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('grupos.index')" wire:navigate>{{ __('Grupos') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('ufs.index')" wire:navigate>{{ __('Unidade Federativa (UF)') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('unidades.index')" wire:navigate>{{ __('Unidades') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('funcionarios.index')" wire:navigate>{{ __('Funcionarios') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('checklistEntradas.index')" wire:navigate>{{ __('Checklist Entrada') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('checklistSaidas.index')" wire:navigate>{{ __('Checklist Saída') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('detalhes.index')" wire:navigate>{{ __('Detalhes') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('pricing.index')" wire:navigate>{{ __('Compra de Planos') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('assinar.index')" wire:navigate>{{ __('Assinatura') }}</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <x-nav-link :href="route('servicos.index')" :active="request()->routeIs('servicos.index')" wire:navigate>
                        {{ __('Serviços') }}
                    </x-nav-link>
                    <x-nav-link :href="route('acompanhamentos.index')" :active="request()->routeIs('acompanhamentos.index')" wire:navigate>
                        {{ __('Acompanhamentos') }}
                    </x-nav-link>
                    {{-- <x-nav-link :href="route('acompanhas.index')" :active="request()->routeIs('acompanhas.index')" wire:navigate>
                        {{ __('Acompanhamentos Original') }}
                    </x-nav-link> --}}
                </div>
            </div>

            <!-- Direita: Menu de Configurações -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 pr-20">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-base font-small leading-5 rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150" style="margin-right: 20px;">
                            <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                            <div class="ml-2">
                                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Botão Hamburguer -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Responsivo -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" wire:navigate>
                {{ __('Usuários') }}
            </x-responsive-nav-link>
        </div>

        <!-- Opções de Configuração Responsiva -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>


