<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<!-- Modal -->

<body onload="ultimaMensagem()">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="imagem">
                    <img src="storage/img/ass.png" class="imagem">
                </div>
                <h5 class="modal-title" id="exampleModalLabel">Assistente Virtual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body texto">
                <div class="tela-msg">
                    <div class="mensagens col-sm-11" id="msg">
                        <div class="msg assistente col-sm-7">
                            Como possor ajudar?<hr>  
                            1- Turorial. <br>
                            2- Dicas. <br>
                            3- 
                        </div>

                        <div id="end"></div>
                    </div>
                    <div class="escrever col-sm-12">
                        <form method="POST">
                            <div class="form-row">
                                <div class="col-9">
                                    <input type="text" id="chat" name="chat" class="form-control" style="border:1px solid silver;">
                                </div>
                                <div class="col-3">
                                    <button id="btn" class="btn btn-primary col-sm-12">Enviar</button>
                                </div>
                            </div>
                        </form>


                        <!-- ---------------------------------------------------------------   -->

                        <script>
                            function ultimaMensagem() {
                                var x = document.getElementById('end');
                                x.scrollIntoView();
                            }

                            $("#document").ready(function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                            });


                            function ajax_bot(pergunta) {
                                $.ajax({
                                    type: "POST",
                                    url: "/assistente/resposta",
                                    data: {
                                        pergunta: pergunta
                                    },
                                    success: function(data) {
                                        $("#msg").append("<div class='msg assistente col-sm-7'>" + data["resposta"] + "</div>");
                                    },
                                    erro: function erro(msg) {
                                        console.log(msg);
                                    }
                                });
                            }

                            function add_chat() {
                                let pergunta = $("#chat").val();

                                if (perfunta == "") {
                                    alert("DIGITE SUA MENSAGEM");
                                } else {
                                    $("#msg").append("<div class='msg usuario col-sm-7'>" + pergunta + "</div>");
                                    ajax_bot(pergunta);
                                }
                            }

                            $("#btn").on('click', function() {
                                add_chat();
                            });
                        </script>

                        <style>
                            div.texto {
                                font-size: 15px;
                            }

                            div.rolagem {
                                overflow-wrap: auto;
                            }

                            div.tela-msg {
                                width: 90%;
                                margin: auto;
                            }

                            div.mensagens {
                                height: 400px;
                                overflow: auto;
                                border: 1px solid rgb(233, 236, 239);
                                border-left: none;
                                border-right: none;
                                margin: 0px auto 15px auto;
                                padding: 5px;
                            }

                            div.escrever {
                                background-color: white;
                                height: skyblue;
                            }

                            div.msg {
                                padding: 10px;
                                border-radius: 3%;
                                margin: 1%;
                            }

                            div.assistente {
                                background-color: silver;
                                overflow-wrap: break-word;
                                float: left;
                            }

                            div.usuario {
                                background-color: #007BFF;
                                color: white;
                                float: right;
                            }

                            div#end {
                                float: left;
                                width: 100%;
                            }

                            img.imagem {
                                height: 40px;
                                width: 40px;
                                border-radius: 50%;
                                margin-right: 10px;
                            }
                        </style>