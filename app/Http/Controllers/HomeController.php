<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Conteudo;
use App\Genero;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $limit = 8;

        $user = Auth::user();
        $mais_vistos = Conteudo::orderBy('visualizacoes')->limit($limit)->get();
        $lancamentos = Conteudo::orderBy('created_at', 'desc')->limit($limit)->get();

        $generos = Genero::limit(3)->get();
        $filmes = [];
        for($i=0; $i < count($generos); $i++){
            $filmes[$i] = (Conteudo::where('categoria_id', 1)->where('genero_id', $generos[$i]->id)->limit($limit)->get());
        }
        return view('home', compact('user', 'mais_vistos', 'lancamentos', 'generos', 'filmes'));
    }
}
