<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Document</title>

</head>

<body style="marfin">
    
            <input type="text" id="tt">
            <button id="bnt" name="bnt">
                click
            </button>
    
    <div id="div" style="background-color:rgb(25, 31, 38)">
        
        </div>
</body>

<script>
    $('#bnt').on('click', function() {
        var tt = document.getElementById('tt').value;
        ajax(tt);

    });

    function ajax(data) {
        $.ajax({
            // type: 'POST',
            url: '/test',
            // dataType: 'json',
            data: {
                data: data
            },
            success: function success() {
                alert(data);
                $('#div').html(data);
                $('#div').html("<img src='storage/img/seta.png'/>");
            }
        });
    }







    // ajax simples---------------------------------------------------------------->
    // function ajax(t){
    //     $.ajax({
    //         type: "POST",
    //         url: "/test",
    //         dataType: "json",
    //         data:{ t:t },
    //         success: function success(){
    //             alert('asdnflhabsdlfhasdfjoiasdjfsj');
    //         },
    //         erro: function erro(msg){
    //             console.log(msg);
    //         }

    //     });
    // }

    //ajax com done--------------------------------------------------------------->
    // $.ajax({
    //         url: "script.php",
    //         type: "POST",
    //         data: "campo1=dado1&campo2=dado2&campo3=dado3",
    //         dataType: "html"

    //     }).done(function(resposta) {
    //         alert('çaisudcvahsdvhasudhfoçasjdço');

    //     }).fail(function(jqXHR, textStatus) {
    //         console.log("Request failed: " + textStatus);

    //     }).always(function() {
    //         console.log("completou");
    //     });
</script>

</html>