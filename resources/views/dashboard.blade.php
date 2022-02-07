<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (auth()->user()->isAdmin() || auth()->user()->authorized)

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <img src="assets/images/icone-loja.jpg" width="100" height="100">
                    </div>
                    <h4 class="mb-1 mt-1">LOJAS</h4>
                    @if (auth()->user()->isAdmin())
                    <a href="{{ route('shops.create') }}">
                        <p class="text-muted mb-0">> Cadastrar Lojas</p>
                    </a>
                    @endif
                    @if (auth()->user()->isRoleRepresentative())
                    <a href="{{ route('shops.search.cnpj') }}">
                        <p class="text-muted mb-0">> Cadastrar Lojas</p>
                    </a>
                    @endif
                    <a href="{{ route('shops.index') }}">
                        <p class="text-muted mb-0">> Listar Lojas</p>
                    </a>
                </div>
            </div>
        </div>
        @if (auth()->user()->isAdmin())
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <img src="assets/images/icone-representantes.jpg" width="100" height="100">
                    </div>
                    <h4 class="mb-1 mt-1">REPRESENTANTES</h4>
                    <a href="{{ route('user.request.authorization') }}">
                        <p class="text-muted mb-0">> Permissões Usuários</p>
                    </a>
                    <a href="{{ route('representatives.create') }}">
                        <p class="text-muted mb-0">> Atribuir Representante</p>
                    </a>
                    <a href="{{ route('representatives.index') }}">
                        <p class="text-muted mb-0">> Listar Representantes</p>
                    </a>
                </div>
            </div>
        </div>
        @endif
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <img src="assets/images/icone-comissao.jpg" width="100" height="100">
                    </div>
                    <h4 class="mb-1 mt-1">COMISSÃO</h4>
                    @if (auth()->user()->isAdmin())
                    <a href="{{ route('commissions.create') }}">
                        <p class="text-muted mb-0">> Cadastrar Comissões</p>
                    </a>
                    @endif
                    <a href="{{ route('commissions.index') }}">
                        <p class="text-muted mb-0">> Listar Comissões</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->isAdmin())
                        <h4 class="card-title mb-4">
                            Comissões dos Representantes
                    @else
                        <h4 class="card-title mb-4">
                            Minhas Comissões
                    @endif
                            | <small>Soma Total: R$ {{ $sumCommissionValue }}</small>
                        </h4>
                    <div data-simplebar style="max-height: 336px;">
                        <div class="table-responsive">
                            <table class="table table-borderless table-centered table-nowrap">
                                <tbody>
                                    @foreach ($commissions as $commission)
                                        <tr>
                                            <td>
                                                <img src="{{ $commission->representative->user->picture_profile }}" class="avatar-xs rounded-circle " alt="...">
                                            </td>
                                            <td>
                                                <h6 class="font-size-15 mb-1 fw-normal">{{ $commission->representative->name }}</h6>
                                                <p class="text-muted font-size-13 mb-0">{{ $commission->representative->state->name }} - Loja {{ $commission->shop->name }}</p>
                                            </td>
                                            <td>
                                                @if ( $commission->status == \App\Models\Commission::STATUS_PAID)
                                                    <span class="badge bg-soft-success font-size-12">
                                                @else
                                                    <span class="badge bg-soft-danger font-size-12">
                                                @endif
                                                    {{ $commission->getStatusName() }}
                                                </span>
                                            </td>
                                            <td class="text-muted fw-semibold text-end">R$ {{ $commission->value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $commissions->render() }}
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Histórico de Lojas</h4>
                    <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 336px;">
                        @foreach ($historyShopsCreated as $represenatative)
                            @foreach ($represenatative->shops as $shop)
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <p class="text-muted mb-1 font-size-13">{{ $shop->created_at->diffForHumans() }}</p>
                                        <p class="mb-0">
                                            Loja {{ $shop->name }}, cadastrada pelo respresentante: 
                                            <span class="text-primary">{{ $represenatative->name }}</span>
                                            <br>
                                            @if ($shop->pivot->approved)
                                                <span class="badge bg-success">APROVADO</span>
                                            @else
                                                <span class="badge bg-danger">ESPERANDO APROVAÇÃO</span>
                                            @endif
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @else

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    Aguardando autorização para liberação dos acessos!
                </div>
            </div>
        </div>
    </div>

    @endif
</x-app-layout>
