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
        $html = '<ul>';

        if ($id) {
            $html .= "<li>$series[$id]</li>";
            $html .= '</ul>';

            return $html;
        };

        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        };
        $html .= '</ul>';

        return $html;
    }
}
