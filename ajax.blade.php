<script>
    function ajax_bot(pergunta, resposta) {
        $.ajax({
            type: "POST",
            url: "assistent",
            dataType: "json",
            data: {
                pergunta: pergunta,
                resposta: resposta
            },
            success: function success(data) {
                //alert(data['total']);
                $("#resposta_" + resposta).text(data['total']);
            },
            erro: function erro(msg) {
                console.log(msg);
            }
        });
    }
</script>