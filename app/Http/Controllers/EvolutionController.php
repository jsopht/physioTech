<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evolution;
use App\Evaluation;

class EvolutionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $evaluation = Evaluation::findOrFail(request()->get('evaluation'));

        return view('evolutions.create')->with(compact('evaluation'));
    }

    public function store(Request $request)
    {
        $request->merge(['evolution_date' => dbDate($request->evolution_date)]);

        if($evolution = Evolution::create($request->all())) {
            return redirect()->to(route('avaliacao.edit', $request->evaluation_id) . '#ev-' . $evolution->id)
                ->withSuccess('Evolução criada com sucesso!');
        }

        $request->merge(['evolution_date' => brDate($request->evolution_date)]);

        return back()->withErrors('Erro ao criar a evolução.')->withinput();
    }

    public function edit($id)
    {
        $evolution = Evolution::findOrFail($id);
        $evaluation = Evaluation::findOrFail(request()->get('evaluation'));

        return view('evolutions.edit')->with(compact('evolution', 'evaluation'));
    }

    public function update($id, Request $request)
    {
        $request->merge(['evolution_date' => dbDate($request->evolution_date)]);

        if(Evolution::findOrFail($id)->update($request->all())) {
            return redirect()->to(route('avaliacao.edit', $request->evaluation_id) . '#ev-' . $id)
                ->withSuccess('Evolução atualizada com sucesso!');
        }

        return back()->withErrors('Erro ao criar a evolução.')->withinput();
    }

    public function destroy($id)
    {
        if(Evolution::destroy($id)) {
            return redirect()->route('avaliacao.edit', request()->get('evaluation'))
                ->withSuccess('Evolução deletada com sucesso!');
        }

        return back()->withErrors('Erro ao deletar evolução.');
    }
}
