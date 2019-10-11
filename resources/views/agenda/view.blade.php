@extends('layouts.atividades')

@section('atividades')
<div class="tela">
  <form action="{{ route('salvar')}}" method="POST">
    @csrf
    <div>
      <h5 class="data">{{date('d.m.Y', strtotime($data))}}</h5>
    </div>

    <!-------------------------------------------------- INPUT TÍTULO  -------------------------------------------------->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">
          <img src="../storage/ikons/32/notepad_add_silver.png" class="tarefa-atividade">
        </span>
      </div>
      <input type="text" name="add_tarefa" id="add_tarefa" class="form-control input-atividade" placeholder="Título" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <!-------------------------------------------------- INPUT COR  -------------------------------------------------->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">
          <img src="../storage/ikons/32/cog_silver.png" class="tarefa-atividade">
        </span>
      </div>
      <input type="color" name="add_cor" id="add_cor" class="form-control cor" value="#E9ECEF">
    </div>

    <!-------------------------------------------------- TEXTAREA DESCRIÇÂO  -------------------------------------------------->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">
          <img src="../storage/ikons/32/text_center_silver.png" class="tarefa-atividade">
        </span>
      </div>
      <textarea name="add_descricao" name="add_descricao" id="add_descricao" rows="5" class="tarefa-area" placeholder="Descrição"></textarea>
    </div>

    <div class="input-group mb-3 col-4"> 
      <button type="submit" name="btn-add" id="btn-add-1" class="btn btn-primary">
        Adicionar
      </button>
    </div>
  </form>
</div>
@endsection