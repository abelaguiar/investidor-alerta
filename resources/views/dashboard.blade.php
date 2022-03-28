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
		<div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Melhores Empresas Avaliadas
                    </h4>
                </div>
                <div class="card-body">
                    @foreach ($positiveTopFive as $company)
                        <a href="{{ route('companies.avaliations', $company->id) }}" class="link-secondary">
                            <div class="alert alert-border alert-border-success alert-dismissible">
                                <i class="uil-grin " style="font-size: 23px; color: #34c38f"></i><br>
                                <b> {{ $company->name }} </b>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-6">
            @foreach ($avaliationsTopFive as $avaliation)
                <div class="card card-body">
                    <div class="border p-4 rounded">
                        <div class="border-bottom pb-3">
                            <p class="float-sm-end text-muted font-size-13">{{ $avaliation->created_at->formatLocalized('%A %d %B %Y') }}</p>
                            <div class="flex-1">
                                <h5 class="font-size-20">{{ $avaliation->name }}</h5>
                                Empresa: <span class="text-primary">{{ $avaliation->company->name }}</span><br>
                                @if ($avaliation->company->link)
                                Site: <span class="text-primary">{{ $avaliation->company->link }}</span><br>
                                @endif
                                Produto Oferecido: <span class="text-primary">{{ $avaliation->product->nameWithTopic() }}</span><br>
                                <br>
                            </div>
                            <p class="text-muted mb-4">
                                {!! $avaliation->description_experience_product !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Piores Empresas Avaliadas</h4>
                </div>
                <div class="card-body">
                    <div class="card">
                        @foreach ($negativeTopFive as $company)
                            <a href="{{ route('companies.avaliations', $company->id) }}" class="link-secondary">
                                <div class="alert alert-border alert-border-danger alert-dismissible">
                                    <i class="uil-frown" style="font-size: 23px; color: #f46a6a"></i><br>
                                    <b> {{ $company->name }} </b>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
