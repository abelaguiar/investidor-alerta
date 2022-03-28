<x-app-layout>
    
    <div class="row">
        @forelse ($avaliations as $key => $avaliation)
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mt-0">
                            <p>{{ $avaliation->product->nameWithTopic() }}</p>
                            <p>{{ $avaliation->name }}</p>
                        </h4>
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
                            <i class="uil uil-check"></i> Permitir
                        </a>
                        <a class="btn btn-danger waves-effect waves-light" 
                            onclick="event.preventDefault();
                            document.getElementById('avaliations-destroy-form-{{ $avaliation->id }}').submit();
                        ">
                            <i class="uil uil-trash"></i> Remover
                        </a>
                        <a type="button" class="btn btn-primary waves-effect waves-light" style="margin-top: 5px;" data-bs-toggle="modal" data-bs-target="#addComments{{$key}}">
                            <i class="fa fa-plus"></i> Adicionar Comentário
                        </a>
                        <form id="avaliations-destroy-form-{{ $avaliation->id }}" action="{{ route('avaliations.destroy', $avaliation->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a href="{{ $avaliation->document }}" download class="btn btn-info waves-effect waves-light" style="margin-top: 5px;">
                            <i class="fa fa-download"></i> Documento
                        </a>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>

    @forelse ($avaliations as $key => $avaliation)
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
                        <b>Ultimos comentários adicionados:</b> <br><br>
                        @foreach ($avaliation->comments as $comment)
                            <p>
                                {{ $comment->description }} <hr>
                            </p>
                        @endforeach

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