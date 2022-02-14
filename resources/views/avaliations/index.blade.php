<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Lojas') }}
    </h2>
</x-slot>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buscar por Lojas</h4>
                <form action="{{ route('shops.search') }}" class="outer-repeater">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Digite o nome da Loja</label>
                                <input name="name" type="text" class="form-control" placeholder="Nome...">
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary">
                        <i class="fa fa-search"></i> Buscar
                    </button>
                    <a href="{{ route('shops.index') }}" class="btn btn-info">
                        <i class="fa fa-list"></i> Limpar Busca
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($shops as $shop)
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <h4 class="card-title" style="margin-top:30px ">
                    {{ $shop->cnpj }} <br>
                    {{ $shop->name }} <br>
                </h4>
                {{ $shop->state->name }} | {{ $shop->city->name }}
                <div class="card-body">
                    <p class="card-text">{{ \Str::limit($shop->details, 100) }}</p>
                </div>
                <div class="btn-group" role="group">
                    <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-outline-light text-truncate">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $shops->render() }}

</x-app-layout>