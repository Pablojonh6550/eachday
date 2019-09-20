@extends('layouts.calendar')

@section('content')
<section class="dados">
    <a href="{{route('exibir_feriados')}}">Feriados</a>
    <section class="feriados">
        <form action="{{ route('add_data') }}" method="post">
            @csrf
            <article class="corpo">
                <div class="iinput-group mb-3">
                    <label class="label-local" for="comemoracao">Comemorativo</label>
                    <input type="text" class="input-local form-control" id="comemoracao" name="comemoracao" required autofocus>
                </div>

                <div class="iinput-group mb-3">
                    <label class="label-local" for="dia">Dia</label>
                    <input type="number" class="input-local form-control" id="dia" name="dia" required >
                </div>

                <div class="iinput-group mb-3">
                    <label class="label-local" for="mes">Mês</label>
                    <select class="form-control" id="mes" name="mes" required>
                        <option></option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>

                <div class="iinput-group mb-3">
                    <label class="label-local" for="radioBtn">Prioridade</label>
                    <div id="radioBtn" class="btn-group col-12">
                        <a class="btn btn-outline-secondary btn-sm" data-toggle="prioridade" data-title="1" name="prioridade">Prioritário</a>
                        <a class="btn btn-outline-secondary active btn-sm" data-toggle="prioridade" data-title="2" name="prioridade">Secundário</a>
                    </div>
                    <input type="hidden" name="prioridade" value="2" id="prioridade">
                </div>
            </article>

            <article class="corpo">
                <div class="iinput-group mb-3">
                    <button type="submit" name="bnt_inserir" id="bnt_inserir" class="btn btn-dark btn-lg btn-block">Inserir</button>
                </div>
            </article>
        </form>
    </section>
</section>
@endsection