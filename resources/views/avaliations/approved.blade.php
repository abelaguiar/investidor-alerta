<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Avaliações para Aprovar</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Whatsapp</th>
                            <th>Empresa</th>
                            <th>Produto</th>
                            <th>Aquisição</th>
                            <th>Descrição</th>
                            <th>Avaliação</th>
                            <th>Documento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($avaliations as $key => $avaliation)
                        <tr>
                            <td>{{ $avaliation->name }}</td>
                            <td>{{ $avaliation->email }}</td>
                            <td>{{ $avaliation->phone }}</td>
                            <td>{{ $avaliation->company->name }}</td>
                            <td>
                                @if($avaliation->topic_id)  
                                {{ $avaliation->product->name .' - '. $avaliation->topic->name }}
                                @else
                                {{ $avaliation->product->name }}
                                @endif
                            </td>
                            <td>{{ $avaliation->date_acquisition }}</td>
                            <td title="{{ $avaliation->description_experience_product }}">
                                {{ Str::limit($avaliation->description_experience_product, 10) }}
                            </td>
                            <td>{{ $avaliation->avaliation_count }}</td>
                            <td>
                                <a href="{{ $avaliation->document }}">
                                    Download
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('avaliation.approved', $avaliation->id) }}" class="btn btn-sm btn-success">
                                    Aprovar
                                </a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>

                {{ $avaliations->render() }}
            </div>
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
            @foreach ($avaliations as $key => $avaliation)
            $("#rating-1to10{{$key}}").barrating("show",{theme:"bars-1to10", hoverState:false, fastClicks:false})
            @endforeach
        </script>
    </x-slot>

</x-app-layout>