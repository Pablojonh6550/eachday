@extends('layouts.calendar')

@section('content')
<section class="dados">
  <div class="tela">
    <form action="{{ route('salvar')}}" method="POST">
    @csrf
    <div>
      <h3>{{date('d.m.Y', strtotime($data))}}</h3>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Tarefa</span>
      </div>
      <input type="text" name="add_tarefa" id="add_tarefa" class="form-control" placeholder="Nova atividade" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Cor da atividade</span>
      </div>
      <input type="color" name="add_cor" id="add_cor" class="form-control">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Descrição</span>
      </div>
      <textarea name="add_descricao" name="add_descricao" id="add_descricao" cols="30" rows="5" style="resize:none"></textarea>
    </div>

    <div class="input-group mb-3"> 
      <div class="input-group-prepend"></div>
      <input type="hidden" name="data" value="{{$data}}">
      <a href="{{route('calendar')}}" class="btn btn-danger alinkado">Cancelar</a>
      <button type="submit" name="btn-add" class="btn btn-primary">Adicionar</button>
    </div>
    </form>
  </div>
</section>
@endsection