<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Avaliações da Empresa {{ $company->name }}
            </h4>
        </div>
        <div class="card-body">
            @forelse ($company->avaliations as $key => $avaliation)
            <div class="card">
                <div class="card-body">
                    <h4>{{ $avaliation->name }}</h4>
                    <br>
                    Empresa: <span class="text-primary">{{ $company->name }}</span> <br>
                    @if($company->links)
                    Link: <a href="{{ $company->links }}" class="text-primary">{{ $company->links }}</a> <br>
                    @endif
                    Produto Oferecido: 
                    <span class="text-primary">
                        {{ $avaliation->product->name }}
                    </span>
                    <br>
                    <br>
                    <p class="text-muted mb-4">{{ $avaliation->description_experience_product }}</p>
                    <div class="mt-3 row">
                        <label>Avaliações do Usuário</label>
                        <div class="col-md-3">
                            <select id="rating-1to10{{ $key }}" name="avaliation_count" autocomplete="off" disabled>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ $avaliation->avaliation_count == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>  
                        </div>
                    </div>
                     <br>
                </div>
            </div>
            @empty
            <div class="col-xl-12 col-sm-12">
                <div class="card text-center">
                    <br>
                    Não tem avaliações
                    <br>
                    <br>
                </div>
            </div>
            @endforelse
        </div>
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
            @foreach ($company->avaliations as $key => $avaliation)
            $("#rating-1to10{{$key}}").barrating("show",{theme:"bars-1to10", hoverState:false, fastClicks:false})
            @endforeach
        </script>
    </x-slot>

</x-app-layout>