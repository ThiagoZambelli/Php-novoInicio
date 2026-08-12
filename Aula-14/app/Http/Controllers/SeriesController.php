<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id');
        $series = [
            '',
            'teste',
            'teste1',
            'teste2'
        ];
        return view('listar-series', compact('series'));
    }
}
