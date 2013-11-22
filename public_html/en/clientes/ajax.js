function objetoAjax(){
    var xmlhttp=false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(E){
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function Pagina(nropagina){
    divContenido = document.getElementById('contenido');
    ajax=objetoAjax();
    ajax.open("GET", "paginador.php?pag="+nropagina);
    divContenido.innerHTML= '<table style="width: 600px;height: 300px;"><tr><td><center><img src="../recursos/ajax-loader.gif"</center></td></tr></table>';
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            //mostrar resultados en esta capa
            divContenido.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}
function PaginaAn(nropagina){
    divContenido = document.getElementById('contenido');
    ajax=objetoAjax();
    ajax.open("GET", "paginadorAn.php?pag="+nropagina);
    divContenido.innerHTML= '<table style="width: 600px;height: 300px;"><tr><td><center><img src="../recursos/ajax-loader.gif"</center></td></tr></table>';
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            //mostrar resultados en esta capa
            divContenido.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}