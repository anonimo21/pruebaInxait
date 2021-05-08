<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $departamentos = DB::table('departamentos')->pluck('nombre', 'id');
        return view('welcome', compact('departamentos'));
    }
}
