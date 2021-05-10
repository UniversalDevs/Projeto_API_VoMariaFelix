<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Voluntario;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class PaginasController extends Controller
{
    public function Home(){
        return view ('src.index');
    }

    public function voluntarios(){
        $voluntarios = Voluntario::where('status','ativo')->get();
        return view('src.voluntarios', compact('voluntarios'));
    }

    public function projetos(){
        $projetos = Projeto::where('status','ativo')->get();
        return view('src.projetos', compact('projetos'));
    }

    public function Select(Request $request, $slug){
        // $conteudo = Conteudos::where('slug',$slug)->where('status','ativo')->first();
        $conteudo = DB::select('select * from conteudo where slug = ?', [$slug]);
        if(!$conteudo){
            return view('errors.404');
                }
                else{
                    return view("src.interno",compact('conteudo'));
                }
            }

            public function projeto(Request $request, $slug){
                $projeto = Projeto::where('slug',$slug)->where('status','ativo')->first();
                if(!$projeto){
                    return view('errors.404');
                        }
                        else{
                            return view("src.interno",compact('projeto'));
                        }
                    }
                }


       