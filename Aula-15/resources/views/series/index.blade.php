<x-layout title="Séries">
    <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>
    @isset($menssagenSucesso)
    <div class="alert alert-sucess">
        {{ $menssagenSucesso }}
    </div>
    @endisset
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$serie->name}}
            <form method="post" action="/series/destroy/{{ $serie->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sn">
                    X
                </button>
            </form>
        </li>
        @endforeach
    </ul>
</x-layout>