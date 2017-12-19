<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Evolution;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $request->merge(['birthdate' => dbDate($request->birthdate)]);
        $request->merge(['evaluation_date' => dbDate($request->evaluation_date)]);
        $request->merge(['associated_diseases' => arrayToStr($request->associated_diseases)]);
        $request->merge(['family_history' => arrayToStr($request->family_history)]);

        $validator = $this->validation($request);
        if ($validator->fails()) {
            $request->merge(['associated_diseases' => strToArray($request->associated_diseases)]);
            $request->merge(['family_history' => strToArray($request->family_history)]);

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if(Evaluation::create($request->all())) {
            return back()->withSuccess('Avaliação criada com sucesso!');
        }

        $request->merge(['associated_diseases' => strToArray($request->associated_diseases)]);
        $request->merge(['family_history' => strToArray($request->family_history)]);

        return back()->withErrors('Erro ao criar a avaliação.')->withinput();
    }

    public function show($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evolutions = Evolution::find(request()->get('evolutions'));

        $evaluation->associated_diseases = strToArray($evaluation->associated_diseases);
        $evaluation->family_history = strToArray($evaluation->family_history);

        return view('evaluations.show')->with(compact('evaluation', 'evolutions'));
    }

    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        $evaluation->associated_diseases = strToArray($evaluation->associated_diseases);
        $evaluation->family_history = strToArray($evaluation->family_history);

        return view('evaluations.edit')->with(compact('evaluation'));
    }

    public function update($id, Request $request)
    {
        $request->merge(['birthdate' => dbDate($request->birthdate)]);
        $request->merge(['evaluation_date' => dbDate($request->evaluation_date)]);
        $request->merge(['associated_diseases' => arrayToStr($request->associated_diseases)]);
        $request->merge(['family_history' => arrayToStr($request->family_history)]);

        $validator = $this->validation($request);
        if ($validator->fails()) {
            $request->merge(['associated_diseases' => strToArray($request->associated_diseases)]);
            $request->merge(['family_history' => strToArray($request->family_history)]);

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $evaluation = Evaluation::findOrFail($id);
        if($evaluation->update($request->all())) {
            return back()->withSuccess('Avaliação atualizada com sucesso!')->with(compact('evaluation'));
        }

        $request->merge(['associated_diseases' => strToArray($request->associated_diseases)]);
        $request->merge(['family_history' => strToArray($request->family_history)]);

        return back()->withErrors('Erro ao atualizar a avaliação.')->withInput();
    }

    public function destroy($id)
    {
        if(Evaluation::destroy($id)) {
            return redirect()->route('home')->withSuccess('Avaliação deletada com sucesso!');
        }

        return back()->withErrors('Erro ao deletar avaliação.');
    }

    protected function validation(Request $request)
    {
        return \Validator::make($request->all(), [
            'birthdate' => 'required|date_format:Y-m-d H:i:s',
            'evaluation_date' => 'required|date_format:Y-m-d H:i:s',
        ]);
    }

}
