<?php
    $session = mt_rand(1,9999);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js" type="text/javascript"></script>
    <title>Chat-Agenda</title>
</head>
<body>
    <div id="header">
        <div id="chat_output"></div>
        <textarea chat="input"></textarea>
            <!--JQuery-->
            <script type="text/javascript">
                jQuery(function($){
                    // websocket;
                    var websocket_serve = new WebSocket("ws://localhost:8000");   
                        websocket_serve.onopen = function(e)
                        {
                            websocket_serve.send(JSON.stringify({
                                'type':'socket',
                                'user_id':<?=$session?>
                                }) 
                             );
                        }
                    //-----------------------------------
                        websocket_serve.onerror = function(e)
                        {
                             // erro de sistema
                        }
                    //-----------------------------------
                        websocket_serve.onmessage = function(e)
                        {
                            
                            var json = JSON.parse(e.data);

                                switch(json.type){
                                    case 'chat';
                                        $('#chat_output').append(json.msg);
                                        'break';
                                }
                        }

                    //Events
                        $('#chat_input').on('keyup',function(e)
                        {
                            if(e.keyCode==13 && !e.shiftKey){
                                var chat_msg = $(this).val();
                                    websocket_serve.send(
                                        JSON.stringiry({
                                        'type':'chat',
                                        'user_id':<?=$session?>,
                                        'chat_msg':chat_msg
                                        })
                                    );
                                    $(this).val('');
                            }
                        });
                });
            </script>
    </div>
</body>
</html>