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
                    <h4 class="card-title">LISTA USUÁRIOS</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="21%" align="Left">Nome</th>
                                    <th width="21%" align="Left">Email</th>
                                    <th width="21%" align="Left">Grupo</th>
                                    <th width="20%" align="Left">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            @if ($user->name != 'admin')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info text-truncate">
                                                    <i class="fa fa-edit"></i> Editar
                                                </a>
                                                @if(auth()->user()->isAdmin())
                                                    <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-xs light btn-danger"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('users-destroy-form-{{ $user->id }}').submit();">
                                                        <i class="fa fa-trash"></i> Excluir
                                                    </a>
                                                    <form id="users-destroy-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                @endif
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