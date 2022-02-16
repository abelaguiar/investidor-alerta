<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
    </div>

    <div class="row">
        @foreach (App\Models\Product::all() as $product)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $product->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            @if($product->topics->isNotEmpty())
                                @foreach($product->topics as $topic)
                                <div class="col-sm-8">
                                    {{ $topic->name }}
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <a href="{{ route('avaliation.index', [$product->id, $topic->id]) }}" class="btn btn-primary waves-effect waves-light">
                                        Ver
                                        Avaliações
                                        Aqui
                                    </a>
                                </div>
                                @endforeach
                            @else
                                <div class="col-sm-4 mt-2">
                                    <a href="{{ route('avaliation.index', $product->id) }}" class="btn btn-primary waves-effect waves-light">
                                        Ver
                                        Avaliações
                                        Aqui
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</x-app-layout>
