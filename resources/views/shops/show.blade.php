<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lojas') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LOJAS</h4>
                    <p class="card-title-desc">Digite o CNPJ da loja.</p>
                    <form method="POST" action="{{ route('shops.show.processing', $shop->id) }}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>CNPJ</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Detalhes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $shop->cnpj }}</td>
                                        <td>{{ $shop->name }}</td>
                                        <td>
                                            <b>CEP</b>: {{ $shop->cep }} <br>
                                            <b>Endereço</b>: {{ $shop->address }}
                                            {{ $shop->address_number }} - 
                                            {{ $shop->complements }}
                                            <br>
                                            <b>Estado</b>: {{ $shop->state->name }} |  
                                            <b>Cidade</b>: {{ $shop->city->name }}
                                        </td>
                                        <td>{{ $shop->details }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-check me-1"></i> <b>SOLICITAR VINCULAÇÃO LOJA</b>
                        </button>
                    </form>
                </div>
            </div>
        </div> 
    </div>

    <x-slot name="scripts">
        <script type="text/javascript" src="/assets/js/jquery.mask.min.js"></script>
        <script>
            $(function(){
                $('#cnpj').mask('99.999.999/9999-99');
            });
        </script>
    </x-slot>

</x-app-layout>
