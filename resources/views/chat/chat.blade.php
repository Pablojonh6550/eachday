<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
</head>
<body>
    <section class="tela">
        <article class="titulo">
            <div class="sair">
                <a href="{{route('index')}}">Voltar</a>
            </div>

            <div class="usuario">
                <div class="foto">
                    <img src="folha.jpg">
                </div>

                <div class="nome">
                    Daniel
                </div>
            </div>
        </article>
        
        <article class="mensagens">
            <div class="msg-recebida">
                Olá, mundo!
            </div>

            <div class="msg-enviada">
                Olá, tudo bem?
            </div>

            <div class="msg-enviada">
                Sisi adoro.
            </div>

            <div class="msg-recebida">
                Ainda bem né parceiro
            </div>
        </article>

        <article class="digitar">
            <form action="" method="POST">
                <div class="campo-texto">
                    <input type="text" name="campo-texto">
                </div>

                <div class="enviar">
                    <input type="submit" name="btn-digitar">
                <div>
            </form>
        </article>
    </section>
</body>
</html>