@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <b>Erros encontrados, por favor, corriga para continuar:</b>
        <ul class="font-medium text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
