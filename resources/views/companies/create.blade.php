<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastrar Empresa</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('companies.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome *</label>
                                    <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>CNPJ *</label>
                                    <input name="cnpj" id="cnpj" class="form-control" type="text" value="{{ old('cnpj') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input name="links" class="form-control" type="text" value="{{ old('link') }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save me-1"></i> <b>Cadastrar</b>
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
