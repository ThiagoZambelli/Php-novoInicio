<x-layout title="Editar série {{ $serie->name }}">    
    <form action="/series/edit/{{ $serie->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="name">Nome</label>

            <input
                class="form-control"
                type="text"
                id="name"
                name="name"
                value="{{ $serie->name }}">
        </div>
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </form>
</x-layout>