setTimeout(function(){ 
    var msg = document.getElementsByClassName("messagem");
    while(msg.length > 0){
        msg[0].parentNode.removeChild(msg[0]);
    }
}, 5000);