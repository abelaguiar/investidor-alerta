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
                    <form method="POST" action="{{ route('shops.search.cnpj.processing') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label>CNPJ</label>
                                <input name="cnpj" id="cnpj" class="form-control" type="text" value="{{ old('cnpm') }}">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            AVANÇAR <i class="fa fa-arrow-right me-1"></i>
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
