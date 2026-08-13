<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

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
        Serie::create($request->all());
        return redirect('/series');
    }
}
