<x-layout title="Nova serie">
    <form action="/series/salvar" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="name">Nome</label>
                <input autofocus class="form-control" type="text" id="name" name="name">
            </div>
            <div class="col-2">
                <label class="form-label" for="sessonsQty">Nº Temporadas</label>
                <input class="form-control" type="text" id="sessonsQty" name="sessonsQty">
            </div>
            <div class="col-2">
                <label class="form-label" for="episodesPerSeason">Eps / Temporada</label>
                <input class="form-control" type="text" id="episodesPerSeason" name="episodesPerSeason">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>