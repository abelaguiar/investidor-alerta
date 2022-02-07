<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lojas') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LOJAS</h4>
                    <p class="card-title-desc">Cadastre sua loja.</p>
                    <form method="POST" action="{{ route('shops.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input name="cnpj" id="cnpj" class="form-control" type="text" value="{{ old('cnpm') ?? $cnpj }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input name="cep" id="cep" class="form-control" type="text" value="{{ old('cep') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input name="address" id="address" class="form-control" type="text" value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input name="address_number" id="number" class="form-control" type="text" value="{{ old('number') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input name="complements" id="complement" class="form-control" type="text" value="{{ old('complements') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Estado*</label>
                                    <select name="state_id" id="state_id" class="form-control" onchange="citiesDropdown(this.value)">
                                        <option value="">Lista de Estado*</option>
                                        @foreach ($states as $id => $name)
                                            <option value="{{ $id }}" {{ old('state_id') == $id ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Cidade*</label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="">Lista de Cidades*</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Detalhes</label>
                            <p class="text-muted mb-2"> Descreva detalhes sobre a loja! </p>
                            <textarea name="details" id="textarea" class="form-control" maxlength="225" rows="3" placeholder="Essa área de texto tem um limite de 225 caracteres.">{{ old('details') }}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save me-1"></i> CADASTRAR
                        </button>
                    </form>
                </div>
            </div>
        </div> 
    </div>

    <x-slot name="scripts">
        <script type="text/javascript" src="/assets/js/locations.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.mask.min.js"></script>
        <script>
            $(function(){
                $('#cep').mask('99999-999');
                $('#cnpj').mask('99.999.999/9999-99');
                @if (old('state_id'))
                    citiesDropdown({{ old('state_id') }}, {{ old('city_id') }});
                @endif
            });
        </script>
    </x-slot>

</x-app-layout>
