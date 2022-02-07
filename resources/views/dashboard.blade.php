<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <img src="assets/images/icone-loja.jpg" width="100" height="100">
                    </div>
                    <h4 class="mb-1 mt-1">LOJAS</h4>
                    <a href="{{ route('dashboard') }}">
                        <p class="text-muted mb-0">> Cadastrar Lojas</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
