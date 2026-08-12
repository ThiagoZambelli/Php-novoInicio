<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::all();
        return view('series.index', compact('series'));
    }
    public function create(Request $request)
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->name = $nomeSerie;        
        $serie->save();
        return redirect('/series');
    }
}
