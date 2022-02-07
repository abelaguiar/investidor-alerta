<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil Usuário') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ mb_strtoupper(auth()->user()->name) }}</h4>
                    <img 
                        src="{{ auth()->user()->picture_profile }}" 
                        alt="{{ mb_strtoupper(auth()->user()->name) }}" 
                        width="150px" 
                        class="img-fluid img-thumbnail"
                    >
                    <br>
                    <small><b>{{ mb_strtoupper(auth()->user()->role->name) }}</b></small>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ATUALIZAR PERFIL</h4>
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Foto Perfil</label>
                                    <input name="picture_profile" class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
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
