<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesForRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        $menssagenSucesso = $request->session()->get("mensagem.successo");

        return view('series.index', compact('series'))->with('mensagemSucesso', $menssagenSucesso);
    }
    public function create(Request $request)
    {
        return view('series.create');
    }
    public function store(SeriesForRequest $request)
    {
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem.successo', "Série '{$serie->name}' adicionada com sucesso");
        return redirect('/series');
    }
    public function destroy(Serie $serie, Request $request)
    {
        $serie->delete();
        $request->session()->flash('mensagem.successo', "Série '{$serie->name}' removida");

        return redirect('/series');
    }
    public function edit(Serie $serie)
    {

        return view('series.edit')->with('serie', $serie);
    }
    public function update(SeriesForRequest $request, Serie $serie)
    {

        $serie->update($request->all());

        $request->session()->flash(
            'mensagem.successo',
            "Série '{$serie->name}' alterada com sucesso"
        );

        return redirect('/series');
    }
}
