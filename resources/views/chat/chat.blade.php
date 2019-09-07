<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/estilo-chat.css')}}">
    <title>Chat</title>
</head>
<body>
    <section class="tela">
        <article class="titulo">
            <div class="sair">
                <img src="imagens/setinha.png" class="invertida-direita">
            </div>

            <div class="usuario">
                <div class="foto">
                    <img src="imagens/pinguins.jpg" class="usuario">
                </div>

                <div class="nome">
                    Daniel
                </div>
            </div>
        </article>
        
        <article class="mensagens">
            <div class="mensagem recebida">
                Olá, mundo!
            </div>

            <div class="mensagem enviada">
                Olá, tudo bem?
            </div>

            <div class="mensagem recebida">
                Sisi adoro.
            </div>

            <div class="mensagem enviada">
                Ainda bem né parceiro
            </div>

            <div class="mensagem enviada">
            Texto é um conjunto de palavras e frases encadeadas que permitem interpretação e transmitem uma mensagem. É qualquer obra escrita em versão original e que constitui um livro ou um documento escrito.    
            </div>
        </article>

        <article class="titulo">
            <form action="" method="POST">
                <div class="campo-texto">
                    <input type="text" name="campo-texto">
                </div>

                <div class="enviar">
                    <input type="submit" value="OK" name="btn-digitar">
                <div>
            </form>
        </article>
    </section>
</body>
</html>