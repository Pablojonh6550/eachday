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

    function Mudarestado(el,bnt,fer) {
        var bntl = document.getElementById(bnt).classList;

        if (bntl == "none") {
            document.getElementById(bnt).classList.remove('none');
            document.getElementById(bnt).classList.add('block');

            document.getElementById(el).classList.remove('block');
            document.getElementById(el).classList.add('none');

            document.getElementById(fer).value="Atividades";
        }else{
            document.getElementById(el).classList.remove('none');
            document.getElementById(el).classList.add('block');

            document.getElementById(bnt).classList.remove('block');
            document.getElementById(bnt).classList.add('none');

            document.getElementById(fer).value="Feriados";
        }
    }

    $('#btn-add-1').on('click', function() {
         alert('dados add');
        // $(document).ready(function(){ $("#alert").modal(); });
        
    });


</script>

</html>