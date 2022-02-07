<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LISTA USUÁRIOS PARA APROVAR</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="21%" align="Left">Nome</th>
                                    <th width="21%" align="Left">Email</th>
                                    <th width="20%" align="Left">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->authorized)
                                                <a href="{{ route('user.authorize', $user->id) }}" class="btn btn-outline-light text-truncate">
                                                    <i class="fa fa-unlock"></i> Desautorizar
                                                </a>
                                            @else
                                                <a href="{{ route('user.authorize', $user->id) }}" class="btn btn-outline-dark text-truncate">
                                                    <i class="fa fa-lock"></i> Autorizar
                                                </a> 
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $users->render() }}

</x-app-layout>