<x-app-layout>

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
        @foreach ($companies as $key => $company)
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ $company['content']->name }} <br>
                        </h4>
                    </div>
                    <div class="card-body">
                        {{ $company['content']->cnpj }}
                        @if ($company['medium'] > 0)
                            <div class="mt-3 row">
                                <h5 style="font-size: 12px">Média Avaliações</h5>
                                <div class="col-md-12">
                                    <select id="rating-1to10{{ $key }}" name="avaliation_count" autocomplete="off" disabled>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $company['medium'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>  
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="btn-group" role="group">
                            <a href="{{ route('companies.edit', $company['content']->id) }}" class="btn btn-outline-light text-truncate">
                                <i class="fa fa-edit"></i> Editar
                            </a>
                            {{--<a href="{{ route('companies.destroy', $company->id) }}" class="btn btn-xs light btn-danger"
                                onclick="event.preventDefault();
                                document.getElementById('companies-destroy-form-{{ $company->id }}').submit();">
                                <i class="fa fa-trash"></i> Excluir
                            </a>
                            <form id="companies-destroy-form-{{ $company->id }}" action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <x-slot name="styles">
        <link rel="stylesheet" href="/assets/css/select2.min.css">
        <link href="/assets/libs/jquery-bar-rating/themes/bars-1to10.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/css-stars.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/fontawesome-stars-o.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/fontawesome-stars.css" rel="stylesheet" type="text/css" />
    </x-slot>

    <x-slot name="scripts">
        <script type="text/javascript" src="/assets/libs/jquery-bar-rating/jquery.barrating.min.js"></script>
        <script type="text/javascript" src="/assets/js/pages/rating-init.js"></script>
        <script>
            @foreach ($companies as $key => $company)
            $("#rating-1to10{{$key}}").barrating("show",{theme:"bars-1to10", hoverState:false, fastClicks:false, readonly: true})
            @endforeach
        </script>
    </x-slot>
    
</x-app-layout>