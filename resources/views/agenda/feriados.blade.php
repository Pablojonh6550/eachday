@extends('layouts.calendar')

@section('content')
<section class="dados">
<section class="feriados">
    <form action="" method="POST">
    @csrf
        <article class="corpo">
			<div class="iinput-group mb-3">
				<label class="label-local" for="dia">Dia</label>
				<input type="number" class="input-local form-control" id="dia" name="dia" required autofocus>
            </div>

            <div class="iinput-group mb-3">
				<label class="label-local" for="mes">Mês</label>
				<select class="form-control" id="mes" name="mes" required>
                    <option></option>
                    <option value="01">Janeiro</option>
                    <option value="02">Fevereiro</option>
                    <option value="03">Março</option>
                    <option value="04">Abril</option>
                    <option value="05">Maio</option>
                    <option value="06">Junho</option>
                    <option value="07">Julho</option>
                    <option value="08">Agosto</option>
                    <option value="09">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
            </div>

			<div class="iinput-group mb-3">
				<label class="label-local" for="comemorativo">Comemorativo</label>
				<input type="text" class="input-local form-control" id="comemorativo" name="comemorativo" required>
            </div>

            <div class="iinput-group mb-3">
				<label class="label-local" for="prioridade">Prioridade</label>
                <input type="radio" class="input-local form-control" id="prioridade" name="prioridade" value="principal" required>
                <input type="radio" class="input-local form-control" id="prioridade" name="prioridade" value="secundario" required>
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