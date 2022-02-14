<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empresas') }}
        </h2>
    </x-slot>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buscar por Empresas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.search') }}" class="outer-repeater">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Digite o nome da empresa</label>
                                    <input name="name" type="text" class="form-control" placeholder="Nome...">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('companies.index') }}" class="btn btn-info">
                            <i class="fa fa-list"></i> Limpar Busca
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        @foreach ($companies as $company)
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <h4 class="card-title" style="margin-top:30px ">
                        {{ $company->name }} <br>
                    </h4>
                    <h4 class="card-title" style="margin-top:30px ">
                        {{ $company->link }} <br>
                    </h4>
                    <div class="btn-group" role="group">
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-outline-light text-truncate">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('companies.destroy', $company->id) }}" class="btn btn-xs light btn-danger"
                            onclick="event.preventDefault();
                            document.getElementById('companies-destroy-form-{{ $company->id }}').submit();">
                            <i class="fa fa-trash"></i> Excluir
                        </a>
                        <form id="companies-destroy-form-{{ $company->id }}" action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    {{ $companies->render() }}
    
    </x-app-layout>