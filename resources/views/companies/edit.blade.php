<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empresas') }}
        </h2>
    </x-slot>

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
                                    <label>Nome</label>
                                    <input name="name" class="form-control" type="text" value="{{ old('name') ?? $company->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input name="links" class="form-control" type="text" value="{{ old('link') ?? $company->link }}">
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save me-1"></i> <b>ATUALIZAR</b>
                        </button>
                    </form>
                </div>
            </div>
        </div> 
    </div>

</x-app-layout>
