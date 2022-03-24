<x-app-layout>
    
    <h4>{{ $product->name }}</h4>
    <br>
    <div class="row">
        @forelse ($avaliations as $key => $avaliation)
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ $avaliation->company->name }} <br>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($avaliation->company->mediumAvaliation() > 0)
                            <div class="mt-3 row">
                                <h5 style="font-size: 12px">Média Avaliações</h5>
                                <div class="col-md-12">
                                    <select id="rating-1to10{{ $key }}" name="avaliation_count" autocomplete="off" disabled>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $avaliation->company->mediumAvaliation() == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>  
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('companies.avaliations', $avaliation->company->id) }}" class="btn btn-outline-light text-truncate">
                            <i class="fa fa-eye"></i> Ver Avaliações
                        </a>
                    </div>
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
            @foreach ($avaliations as $key => $avaliation)
            $("#rating-1to10{{$key}}").barrating("show",{theme:"bars-1to10", hoverState:false, fastClicks:false, readonly: true})
            @endforeach
        </script>
    </x-slot>

</x-app-layout>