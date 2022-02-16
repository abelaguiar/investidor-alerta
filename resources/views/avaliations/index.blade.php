<x-app-layout>
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
</x-app-layout>