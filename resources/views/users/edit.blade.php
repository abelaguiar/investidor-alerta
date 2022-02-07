<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Representante') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">USUÁRIOS</h4>
                    <p class="card-title-desc">Atualize um usuário!</p>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="name" class="form-control" type="text" value="{{ old('name') ?? $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" type="email" value="{{ old('email') ?? $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gropo</label>
                                    <br>
                                    ADMINISTRADOR
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input name="password" class="form-control" type="password" value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Confirmar Senha</label>
                                    <input name="password_confirmation" class="form-control" type="password" value="{{ old('password_confirmation') }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save"></i> ATUALIZAR 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>