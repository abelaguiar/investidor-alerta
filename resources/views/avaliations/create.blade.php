<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Avaliar Empresa</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('avaliations.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" type="text" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <input name="phone" id="phone" class="form-control" type="text" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Produto</label>
                                    <select name="product_topic_id" id="product" class="form-control select2">
                                        <option value="">Selecione um item</option>
                                        @foreach ($products as $product)
                                            @if ($product->topics->isNotEmpty())
                                                <option value="{{ $product->id .'-'. $product->topics->first()->id }}">
                                                    {{ $product->name }} - {{ $product->topics->first()->name }}
                                                </option>
                                            @else
                                                <option value="{{ $product->id}}">
                                                    {{ $product->name }} 
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Empresa Avaliada</label>
                                    <select name="company_id" id="company" class="form-control select2">
                                        <option value="">Selecione um item</option>
                                        @foreach ($companies as $id => $name)
                                            <option value="{{ $id }}">
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Data da Aquisição</label>
                                    <input name="date_acquisition" id="date_acquisition" class="form-control" type="text" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Sua experiência com o produto ou serviço</label>
                            <textarea name="description_experience_product" id="textarea" class="form-control" maxlength="225" rows="3" placeholder="Essa área de texto tem um limite de 225 caracteres.">{{ old('details') }}</textarea>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Documento</label>
                                    <input name="document" class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <label>Sua Avaliação</label>
                            <div class="col-md-3">
                                <select id="rating-1to10" name="avaliation_count" autocomplete="off">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7" selected>7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>  
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-save me-1"></i> <b>ENVIAR</b>
                        </button>
                    </form>
                </div>
            </div>
        </div> 
    </div>

    <x-slot name="styles">
        <link rel="stylesheet" href="/assets/css/select2.min.css">
        <link href="/assets/libs/jquery-bar-rating/themes/bars-1to10.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/bars-horizontal.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/bars-movie.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/bars-pill.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/bars-reversed.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/bars-square.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/css-stars.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/fontawesome-stars-o.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/jquery-bar-rating/themes/fontawesome-stars.css" rel="stylesheet" type="text/css" />
    </x-slot>

    <x-slot name="scripts">
        <script type="text/javascript" src="/assets/libs/jquery-bar-rating/jquery.barrating.min.js"></script>
        <script type="text/javascript" src="/assets/js/pages/rating-init.js"></script>
        <script type="text/javascript" src="/assets/js/select2.full.min.js"></script>
        <script type="text/javascript" src="/assets/js/locations.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.mask.min.js"></script>
        <script>
            $(function(){
                $('#phone').mask('(99) 99999-9999');
                $('#date_acquisition').mask('99/99/9999');
                $('.select2').select2();
            });
        </script>
    </x-slot>

</x-app-layout>
