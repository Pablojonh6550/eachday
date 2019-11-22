<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/estilo-calendario.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Each Day</title>
</head>

<body>
    <section class='corpo'>
        @yield('content')
    </section>
</body>

<script>

    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })

    function atualizar() {
        location.reload();
    }

    function mudarFigura(objeto) {   
        var url = "http://localhost:8000/storage/ikons/32/"
        var up = url+"arrow_up_silver.png"
        var down = url+"arrow_down_silver.png"
        
        var info = document.querySelector('#info-'+objeto.id)
    
        if(info.classList == "mais none") {
            objeto.src = up
            info.classList.remove('none')
        } else {
            objeto.src = down
            info.classList.add('none')
        }
    }

    function mouseOver(objeto, imagem) {
        objeto.src = "../storage/ikons/32/"+imagem+".png";
    }

    function mouseOut(objeto, imagem) {
        objeto.src = "../storage/ikons/32/"+imagem+".png";
    }

    function escolherDia(objeto) {
        var link = "{{ route('checar', ':url') }}"
        link = link.replace(':url', objeto.id)
        window.location.href = link
    }

    function escolherMes(mes) {
        var link = "{{ route('mes', ':url') }}"
        link = link.replace(':url', mes.value)
        window.location.href = link
    }

    $('#deleted').on('click',function() {
    $('#delete').modal('show');
});
    
</script>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">

          <p>Atividade deletada!                          :)</p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</html>