<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Serie $serie)
    {
        $seasons = $serie->seasons()->with('episodes')->get();

        return view('seasons.index', compact('seasons'));
    }
}
