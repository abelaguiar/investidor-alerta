<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Avaliações ({{ $product->name }})
        @if (!is_null($topic->name))
            - {{ $topic->name }}
        @endif
    </h2>
</x-slot>

<div class="row">
    @forelse ($avaliations as $avaliation)
        <div class="col-xl-3 col-sm-6">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ $avaliation->company->name }} <br>
                    </h4>
                </div>
                <div class="card-body">
                    @if (!is_null($avaliation->company->link))
                        <a href="{{ $avaliation->company->link }}">
                            Link empresa
                        </a>
                    @else
                        Não tem link.
                    @endif
                </div>
                <div class="btn-group" role="group">
                    <a href="{{ route('avaliations.edit', $avaliation->id) }}" class="btn btn-outline-light text-truncate">
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

</x-app-layout>