<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function ultimaMensagem() {
            var x = document.getElementById('fim');
            x.scrollIntoView();
        }
    </script>

</head>

<!-- Modal -->
<body onload="javascript:ultimaMensagem();">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
        Abrir modal de demonstração
    </button>

    <div class="modal fade rolagem" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="imagem">
                        <img src="img/bot.jpg" class="imagem">
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Assistente Virtual</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body texto">
                    <div class="tela-msg">
                        <div class="mensagens col-sm-11">
                            <div class="msg assistente col-sm-7">
                                Como posso ajudar?
                            </div>

                            <div class="msg usuario col-sm-7">
                                Com nada, obrigado!
                            </div>

                            <div id="fim"></div>
                        </div>
                        <div class="escrever col-sm-12">
                            <form action="{{}}" method="POST">
                                <div class="form-row">
                                    <div class="col-9">
                                        <input type="text" name="mensagem" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <input type="submit" name="btn-msg" class="btn btn-primary col-sm-12">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>

    div.texto { font-size: 15px; }
    div.rolagem { overflow-wrap: auto; }

    div.tela-msg { width: 90%; margin: auto;}
    div.mensagens { height: 400px; overflow: auto; border: 1px solid rgb(233, 236, 239); border-left: none; border-right: none;  margin: 0px auto 15px auto; padding: 5px; }
    div.escrever { background-color: white; height: skyblue;}

    div.msg { padding: 10px; border-radius: 3%; margin: 1%; }
    div.assistente { background-color: silver; float: left; }
    div.usuario { background-color: #007BFF; color: white; float: right; }

    img.imagem { height: 40px; width: 40px; border-radius: 50%; margin-right: 10px; }

</style>