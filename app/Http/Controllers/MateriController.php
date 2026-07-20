<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi($slug){

        // Check if the view file exists
        if (!view()->exists("contents.".$slug)) {
            abort(404);
        }

        return view("contents.".$slug);
    }
}
