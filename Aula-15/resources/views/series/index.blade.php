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

            <span class="d-flex">
                <a href="/series/edit/{{ $serie->id }}" class="btn btn-primary btn-sn">
                    E
                </a>
                <form method="post" action="/series/destroy/{{ $serie->id }}" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sn">
                        X
                    </button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>