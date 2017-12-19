<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $evaluations = Evaluation::filter()->latest()->paginate(20);

        return view('home')->with(compact('evaluations'));
    }
}
