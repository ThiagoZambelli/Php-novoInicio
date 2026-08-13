<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        Serie::create($request->all());
        $request->session()->flash('mensagem.successo', 'Série adicionada com sucesso');
        return redirect('/series');
    }
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem.successo', 'Série removida');

        return redirect('/series');
    }
}
