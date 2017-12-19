@extends('layouts.app')

@section('content')

<style type="text/css">
   body {
     width: 595px;
     /* to centre page on screen*/
     margin-left: auto;
     margin-right: auto;
     background-color: #fff;
     font-size: 15px;
 }

 header {
  display: none;
 }

 .row div {
  border-bottom: 1px solid black;
  padding: 0;
 }
 .title, .form-check, .no-line {
  border-bottom: 0 !important;
 }
</style>
  <div class="container">
    <div class="row">
      @if(request()->get('evaluation'))
        <div class="col-12 my-2 title"><h5>Dados Pessoais</h5></div>
        <div class="col-12"><strong>Nome:</strong> {{ $evaluation->name }}</div>
        <div class="col-8"><strong>Endereço:</strong> {{ $evaluation->address }}</div>
        <div class="col-4"><strong>Telefone:</strong> {{ $evaluation->phone }}</div>
        <div class="col-6"><strong>Cidade:</strong> {{ $evaluation->city }}</div>
        <div class="col-3"><strong>Estado:</strong> {{ $evaluation->state }}</div>
        <div class="col-3"><strong>CEP:</strong> {{ $evaluation->zipcode }}</div>
        <div class="col-3"><strong>Sexo:</strong> {{ $evaluation->gender == 'm' ? 'Masculino' : 'Feminino' }}</div>
        <div class="col-6"><strong>Data de Nascimento:</strong> {{ brDate($evaluation->birthdate) }}</div>
        <div class="col-3"><strong>Idade:</strong> {{ $evaluation->age }}</div>
        <div class="col-12"><strong>Diagnóstico Clínico:</strong> {{ $evaluation->clinical_diagnosis }}</div>
        <div class="col-5"><strong>Data da Avaliação:</strong> {{ brDate($evaluation->evaluation_date) }}</div>
        <div class="col-7"><strong>Responsável:</strong> {{ $evaluation->responsible }}</div>
        <div class="col-12">
          <strong>Dados vitais:</strong> PA: {{ $evaluation->pa }}mmHg | FC: {{ $evaluation->fc }}bpm
        </div>

        <div class="col-12 my-2 title"><h5>Anamnese</h5></div>
        <div class="col-12"><strong>Q.P.:</strong> {{ $evaluation->qp }}</div>
        <div class="col-12"><strong>HMA:</strong> {{ $evaluation->hma }}</div>
        <div class="col-12"><strong>HPP:</strong> {{ $evaluation->hpp }}</div>
        <div class="col-12 no-line"><strong>Doenças associadas:</strong>
          <div class="form-check form-check-inline ">
            <label class="form-check-label ml-0">
              <input class="form-check-input" type="checkbox" value="cardiacas" @if(isChecked('cardiacas', $evaluation->associated_diseases)) checked @endif> Cardíacas
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"  @if(isChecked('respiratorio', $evaluation->associated_diseases)) checked @endif> Respiratório
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('neurologicas', $evaluation->associated_diseases)) checked @endif> Neurológicas
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('metabolicas', $evaluation->associated_diseases)) checked @endif> Metabólicas
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('dermatologicas', $evaluation->associated_diseases)) checked @endif> Dermatológicas
            </label>
            <label class="form-check-label ml-0">
              <input class="form-check-input " type="checkbox" @if(isChecked('visuais', $evaluation->associated_diseases)) checked @endif> Visuais
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('endocrinas', $evaluation->associated_diseases)) checked @endif> Endôcrinas
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"  @if(isChecked('gastrointestinal', $evaluation->associated_diseases)) checked @endif> Gastrointestinal
            </label>
          </div>
        </div>
        <div class="col-12"><strong>Especificar:</strong> {{ $evaluation->associated_diseases_specifications }}</div>
        <div class="col-12 no-line"><strong>Hábitos de Vida</strong></div>
        <div class="col-12"><strong>Alimentação:</strong> {{ $evaluation->alimentation }}</div>
        <div class="col-6"><strong>Sono:</strong> {{ $evaluation->sleeping }}</div>
        <div class="col-6"><strong>Posição:</strong> {{ $evaluation->sleeping_position }}</div>
        <div class="col-3"><strong>Tabagismo:</strong> {{ $evaluation->smoking == 1 ? 'Sim' : 'Não' }}</div>
        <div class="col-9"><strong>Frequência:</strong> {{ $evaluation->smoking_frequency }}</div>
        <div class="col-3"><strong>Etilismo:</strong> {{ $evaluation->alcoholism == 1 ? 'Sim' : 'Não' }}</div>
        <div class="col-9"><strong>Frequência:</strong> {{ $evaluation->alcoholism_frequency }}</div>
        <div class="col-12 no-line">
          <strong>Antecedentes Familiares:</strong>
          <div class="form-check form-check-inline">
            <label class="form-check-label ml-0">
              <input class="form-check-input" type="checkbox" @if(isChecked('diabetes', $evaluation->family_history)) checked @endif> Diabetes
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('hipertensao', $evaluation->family_history)) checked @endif> Hipertensão
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('cardiopaia', $evaluation->family_history)) checked @endif> Cardiopaia
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('neoplasias', $evaluation->family_history)) checked @endif> Neoplasias
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" @if(isChecked('doenças_hereditarias', $evaluation->family_history)) checked @endif> Doenças Hereditárias
            </label>
          </div>
        </div>
        <div class="col-12"><strong>Especificar:</strong> {{ $evaluation->family_history_specifications }}</div>
        <div class="col-12"><strong>Tratamentos Anteriores:</strong> {{ $evaluation->previous_treatments }}</div>
        <div class="col-12"><strong>Exames Complementare:</strong> {{ $evaluation->complementary_exams }}</div>

        <div class="col-12 my-2 title"><h5>Exame Físico</h5></div>
        <div class="col-12">{{ $evaluation->physical_exam }}</div>
      @endif

      @if(count($evolutions))
        <div class="col-12 my-2 title"><h5>Evoluções</h5></div>

        @foreach($evolutions as $evolution)
          <div class="col-12">
            {{ brDate($evolution->evolution_date) }} <br> {{ $evolution->description }}
          </div>
        @endforeach
      @endif
    </div>
  </div>
  <script type="text/javascript">
    javascript:window.print()
  </script>
@endsection
