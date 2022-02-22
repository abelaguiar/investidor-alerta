<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (auth()->user()->authorized)

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="" style="position: relative;">
                         <h1 class="display-5"><span data-plugin="counterup" style="color: #1c9e02"> {{ $positive }}</span><span style="color: #1c9e02">%</span></h1>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 46px; height: 47px;"></div></div><div class="contract-trigger"></div></div></div>
                    <div>
                        <p class="text-muted mb-0">Percentual Positivo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="" style="position: relative;">
                      <h1 class="display-5"><span data-plugin="counterup" style="color: #ec0a0a"> {{ $negative }}</span><span style="color: #ec0a0a">%</span></h1>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 46px; height: 47px;"></div></div><div class="contract-trigger"></div></div></div>
                    <div>
                        <p class="text-muted mb-0">Percentual Negativo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img src="assets/images/banner.jpg" width="100%" height="70" class="card-img-top img-fluid img-fluid. max-width: 100%;">
            </div>
        </div>
    </div>

    <div class="row">
        @foreach (App\Models\Product::all() as $product)
            <div class="col-4">
                <div class="card">
                    <div class="card-header" style="
                        padding: 0.75rem 1.25rem;
                        margin-bottom: 0;
                        color: #74788d;
                        background-color: rgb(230, 230, 230);
                        border-bottom: 0 solid #f6f6f6;
                    ">
                        <h4 class="card-title" style="
                            text-transform: uppercase;
                            font-size: 15px;
                            color: #74788d;
                        ">{{ $product->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            @if($product->topics->isNotEmpty())
                                @foreach($product->topics as $topic)
                                <div class="col-sm-6">
                                    {{ $topic->name }}
                                </div>
                                <div class="col-sm-6 mt-2" align="right">
                                    <a href="{{ route('avaliation.index', [$product->id, $topic->id]) }}" class="btn btn-sm btn-primary waves-effect waves-light">
                                        Ver Avaliações
                                        <i class="uil uil-arrow-right ms-2"></i>
                                    </a>
                                </div>
                                @endforeach
                            @else
                                <div class="col-sm-12 mt-2" align="right">
                                    <a href="{{ route('avaliation.index', $product->id) }}" class="btn btn-sm btn-primary waves-effect waves-light">
                                        Ver Avaliações
                                        <i class="uil uil-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @else
    <div class="col-xl-12 col-sm-12">
        <div class="card text-center">
            <br>
            Aguarde aprovação para avaliar produtos.
            <br>
            <br>
        </div>
    </div>
    @endif
    
</x-app-layout>
