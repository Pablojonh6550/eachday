window.onload = function(){

    var xhttp = new XMLHttpRequest;
    var button = document.querySelector("#nome do botão");

    xhttp.open('modo de envio(get,post)','local a ser usado',true);

    xhttp.send();

    //funcão onclick
    button.onclick() = function(){
         xhttp.onreadystatechange = function(){

            if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText);
            }
         }
    }

}