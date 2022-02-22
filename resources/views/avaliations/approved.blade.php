<x-app-layout>
    
    <div class="row">
        @forelse ($avaliations as $key => $avaliation)
		<div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-0">{{ $avaliation->name }}</h4>
                    <p class="card-text">{{ $avaliation->description_experience_product }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="text-primary">{{ $avaliation->company->name }}</span></li>
                    <li class="list-group-item">
                        <label>Avaliações do Usuário</label>
                        <select id="rating-1to10{{ $key }}" name="avaliation_count" autocomplete="off" disabled>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ $avaliation->avaliation_count == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>  
                    </li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('avaliation.approved', $avaliation->id) }}" class="btn btn-success waves-effect waves-light">
                        <i class="uil uil-check me-2"></i> Permitir
                    </a>
                </div>
            </div>
        </div>
        @endforeach
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
            $("#rating-1to10{{$key}}").barrating("show",{theme:"bars-1to10", hoverState:false, fastClicks:false})
            @endforeach
        </script>
    </x-slot>

</x-app-layout>