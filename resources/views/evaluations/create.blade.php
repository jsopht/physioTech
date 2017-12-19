@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 mt-3">
      <form method="POST" action="{{ route('avaliacao.store') }}">
        {{ csrf_field() }}

        <h3 class="mt-3">Dados Pessoais</h3>
        <div class="form-group row">
          <div class="col-md-6">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
          </div>

          <div class="col-md-2">
            <label for="age">Idade</label>
            <input type="number" name="age" class="form-control" id="age" value="{{ old('age') }}">
          </div>

          <div class="col-md-4">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
          </div>

          <div class="col-md-2">
            <label for="zipcode">CEP</label>
            <input type="text" name="zipcode" class="form-control" id="zipcode" value="{{ old('zipcode') }}">
          </div>

          <div class="col-md-4">
            <label for="address">Endereço</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
          </div>

          <div class="col-md-3">
            <label for="state">Estado</label>
            <input type="text" name="state" class="form-control" id="state" value="{{ old('state') }}">
          </div>

          <div class="col-md-3">
            <label for="city">Cidade</label>
            <input type="text" name="city" class="form-control" id="city" value="{{ old('city') }}">
          </div>

          <div class="col-md-2">
            <label for="gender">Sexo</label>
            <select name="gender" class="form-control" id="gender">
              <option value="m">Masculino</option>
              <option value="f" {{ (old("gender") == 'f' ? "selected":"") }}>Feminino</option>
            </select>
          </div>

          <div class="col-md-2">
            <label for="birthdate">Data de Nascimento</label>
            <input type="text" name="birthdate" class="form-control" id="birthdate" value="{{ brDate(old('birthdate')) }}" required>
          </div>

          <div class="col-md-8">
            <label for="clinical-diagnosis">Diagnóstico Clínico</label>
            <input type="text" name="clinical_diagnosis" class="form-control" id="clinical-diagnosis" value="{{ old('clinical_diagnosis') }}">
          </div>

          <div class="col-md-2">
            <label for="evaluation-date">Data da Avaliação</label>
            <input type="text" name="evaluation_date" class="form-control" id="evaluation-date" value="{{ brDate(old('evaluation_date', date('Y-m-d'))) }}" required>
          </div>

          <div class="col-md-3">
            <label for="responsible">Responsável</label>
            <input type="text" name="responsible" class="form-control" id="responsible" value="{{ old('responsible', 'Dr. Abraão Pontes') }}">
          </div>

          <div class="col-md-3">
            <label for="pa">PA <span class="text-muted">(mmHg)</span></label>
            <input type="text" name="pa" class="form-control" id="pa" value="{{ old('pa') }}">
          </div>

          <div class="col-md-4">
            <label for="fc">FC <span class="text-muted">(bpm)</span></label>
            <input type="text" name="fc" class="form-control" id="fc" value="{{ old('fc') }}">
          </div>
        </div>

        <h3 class="mt-4">Anamnese</h3>
        <div class="form-group row">
          <div class="col-12">
            <label for="qp"><strong>Q.P.</strong></label>
            <textarea rows="1" class="form-control" id="qp" name="qp">{{ old('qp') }}</textarea>
          </div>

          <div class="col-12">
            <label for="hma"><strong>HMA</strong></label>
            <textarea rows="1" class="form-control" id="hma" name="hma">{{ old('hma') }}</textarea>
          </div>

          <div class="col-12">
            <label for="hpp"><strong>HPP</strong></label>
            <textarea rows="1" class="form-control" id="hpp" name="hpp">{{ old('hpp') }}</textarea>
          </div>

          <div class="col-12">
            <div class="form-check form-check-inline">
              <h6>Doenças associadas</h6>
              <label class="form-check-label ml-0">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="cardiacas" @if(isChecked('cardiacas', old('associated_diseases'))) checked @endif> Cardíacas
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="respiratorio" @if(isChecked('respiratorio', old('associated_diseases'))) checked @endif> Respiratório
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="neurologicas" @if(isChecked('neurologicas', old('associated_diseases'))) checked @endif> Neurológicas
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="metabolicas" @if(isChecked('metabolicas', old('associated_diseases'))) checked @endif> Metabólicas
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="dermatologicas" @if(isChecked('dermatologicas', old('associated_diseases'))) checked @endif> Dermatológicas
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="visuais" @if(isChecked('visuais', old('associated_diseases'))) checked @endif> Visuais
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="endocrinas" @if(isChecked('endocrinas', old('associated_diseases'))) checked @endif> Endôcrinas
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="associated_diseases[]" value="gastrointestinal" @if(isChecked('gastrointestinal', old('associated_diseases'))) checked @endif> Gastrointestinal
              </label>
            </div>
          </div>

          <div class="col-12">
            <label for="associated-diseases-specifications">Especificar</label>
            <textarea rows="1" class="form-control" id="associated-diseases-specifications" name="associated_diseases_specifications">{{ old('associated_diseases_specifications') }}</textarea>
          </div>

          <div class="col-12"><h6>Hábitos de Vida</h6></div>
          <div class="col-12">
            <label for="alimentation">Alimentação</label>
            <textarea rows="1" class="form-control" id="alimentation" name="alimentation">{{ old('alimentation') }}</textarea>
          </div>

          <div class="col-md-6">
            <label for="sleeping">Sono</label>
            <textarea rows="1" class="form-control" id="sleeping" name="sleeping">{{ old('sleeping') }}</textarea>
          </div>

          <div class="col-md-6">
            <label for="sleeping_position">Posição</label>
            <textarea rows="1" class="form-control" id="sleeping_position" name="sleeping_position">{{ old('sleeping_position') }}</textarea>
          </div>

          <div class="col-md-4">
            <div class="form-check form-check-inline">
              <label>Tabagismo</label><br>
              <label class="radio-inline">
                <input type="radio" name="smoking" id="smoking" value="1" @if(old('smoking')) checked @endif> Sim
              </label>
              <label class="radio-inline">
                <input type="radio" name="smoking" id="smoking" value="0" @if(! old('smoking')) checked @endif> Não
              </label>
            </div>
          </div>
          <div class="col-md-8">
            <label for="smoking-frequency">Frequência</label>
            <input type="text" name="smoking_frequency" class="form-control" id="smoking-frequency" value="{{ old('smoking_frequency') }}">
          </div>

          <div class="col-md-4">
            <div class="form-check form-check-inline">
              <label>Etilismo</label><br>
              <label class="radio-inline">
                <input type="radio" name="alcoholism" id="alcoholism" value="1" @if(old('alcoholism')) checked @endif> Sim
              </label>
              <label class="radio-inline">
                <input type="radio" name="alcoholism" id="alcoholism" value="0" @if(! old('alcoholism')) checked @endif> Não
              </label>
            </div>
          </div>
          <div class="col-md-8">
            <label for="alcoholism-frequency">Frequência</label>
            <input type="text" name="alcoholism_frequency" class="form-control" id="alcoholism-frequency" value="{{ old('alcoholism_frequency') }}">
          </div>

          <div class="col-12">
            <div class="form-check form-check-inline">
              <h6>Antecedentes Familiares</h6>
              <label class="form-check-label ml-0">
                <input class="form-check-input" type="checkbox" name="family_history[]" value="diabetes" @if(isChecked('diabetes', old('family_history'))) checked @endif> Diabetes
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="family_history[]" value="hipertensao" @if(isChecked('hipertensao', old('family_history'))) checked @endif> Hipertensão
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="family_history[]" value="cardiopaia" @if(isChecked('cardiopaia', old('family_history'))) checked @endif> Cardiopaia
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="family_history[]" value="neoplasias" @if(isChecked('neoplasias', old('family_history'))) checked @endif> Neoplasias
              </label>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="family_history[]" value="doenças_hereditarias" @if(isChecked('doenças_hereditarias', old('family_history'))) checked @endif> Doenças Hereditárias
              </label>
            </div>
          </div>
          <div class="col-12">
            <label for="family-history-specifications">Especificar</label>
            <textarea rows="1" class="form-control" id="family-history-specifications" name="family_history_specifications">{{ old('family_history_specifications') }}</textarea>
          </div>

          <div class="col-12">
            <label for="previous-treatments"><strong>Tratamentos Anteriores</strong></label>
            <textarea rows="1" class="form-control" id="previous-treatments" name="previous_treatments">{{ old('previous_treatments') }}</textarea>
          </div>

          <div class="col-12">
            <label for="complementary-exams"><strong>Exames Complementares</strong></label>
            <textarea rows="1" class="form-control" id="complementary-exams" name="complementary_exams">{{ old('complementary_exams') }}</textarea>
          </div>

          <div class="col-12">
            <h3 class="mt-4">Exame Físico</h3>
            <label for="physical-exam"></strong></label>
            <textarea rows="1" class="form-control" id="physical-exam" name="physical_exam">{{ old('physical_exam') }}</textarea>
          </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg mt-5 px-5">Salvar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
