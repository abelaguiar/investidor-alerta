<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Avaliações da Empresa {{ $company->name }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-sm-8">
            @forelse ($company->avaliationsOrderByCount() as $key => $avaliation)
                <div class="card">
                    <div class="card-body">
                        <h4>
                            {{ $avaliation->name }}
                            <span class="float-sm-end text-muted font-size-13">
                                {{ $avaliation->created_at->formatLocalized('%A %d %B %Y') }}
                            </span>
                        </h4>
                        <br>
                        Empresa: <span class="text-primary">{{ $company->name }}</span> <br>
                        @if($company->links)
                        Link: <a href="{{ $company->links }}" class="text-primary">{{ $company->links }}</a> <br>
                        @endif
                        Produto Oferecido: 
                        <span class="text-primary">
                            {{ $avaliation->product->nameWithTopic() }}
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
                        @if (auth()->user()->isAdmin())
                            <a type="button" class="btn btn-primary waves-effect waves-light" style="margin-top: 5px;" data-bs-toggle="modal" data-bs-target="#addComments{{$key}}">
                                <i class="fa fa-plus"></i> Adicionar Comentário
                            </a>
                            <br>
                        @endif
                        <br>
                        @if ($avaliation->comments->isNotEmpty())
                            <b>Comentários: </b>
                            <br>
                            @foreach ($avaliation->comments as $comment)
                                <p>{{ $comment->description }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            @empty
                <div class="card text-center">
                    <br>
                    Não tem avaliações
                    <br>
                    <br>
                </div>
            @endforelse
        </div>
        <div class="col-xl-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center" style="margin-top:20px; margin-button: 20px">
                        <h5 class="font-size-20">{{ mb_strtoupper($company->name) }}</h5>
                    </div>
                    <center>
                    <button type="button" class="btn btn-success waves-effect waves-light">
                        <i class="uil-angle-up"></i> {{ $company->positiveAvaliationCount() }} Avaliações
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">
                        <i class="uil-angle-down"></i> {{ $company->negativeAvaliationCount() }} Avaliações
                    </button>
                    </center><br><br>
                </div>
            </div>
        </div>
    </div>

    <div class="m-3">
        {{ $company->avaliationsOrderByCount()->render() }}
    </div>

    @if (auth()->user()->isAdmin())
        @forelse ($company->avaliationsOrderByCount() as $key => $avaliation)
        <div class="modal fade" id="addComments{{$key}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addCommentsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Comentário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('avaliation.comments', $avaliation->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif

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
            $("#rating-1to10{{$key}}").barrating("show",{theme:"bars-1to10", hoverState:false, fastClicks:false, readonly: true,})
            @endforeach
        </script>
    </x-slot>

</x-app-layout>