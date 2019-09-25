 var xhttp = new XMLHttpRequest;

 function xmlHttpGet(url,callback,parameters=''){
    xhttp.onreadystatechange = callback;

    xhttp.open('GET',url+'.php'+paramenters,true);
    xhttp.send();
 }

 function xmlHttpPost(url,callback,paramenters=""){

    xhttp.onreadystatechange = callback;
    xhttp.open('POST',url+'.php'+paramenters,true);
    xhttp.send(paramenters);

 }

