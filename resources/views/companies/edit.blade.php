<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Atualizar Empresa</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('companies.update', $company->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome *</label>
                                    <input name="name" class="form-control" type="text" value="{{ old('name') ?? $company->name }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>CNPJ *</label>
                                    <input name="cnpj" id="cnpj" class="form-control" type="text" value="{{ old('cnpj') ?? $company->cnpj }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input name="links" class="form-control" type="text" value="{{ old('links') ?? $company->links }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save me-1"></i> <b>Atualizar</b>
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
