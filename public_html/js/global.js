function ocargando()
{
    $("#cargando").fadeOut('fast');
}
function mcargando()
{
    $("#cargando").fadeIn('fast');
}
function mensaje(contexto, mensaje)
{
    var img = "<img src='../../../recursos/";
    if(contexto == 'ok')
    {
        img = img + "ok-green.png'";
    }
    else
    {
        img = img + "alert-triangle-red.png'";
    }
    $("#mensaje").slideDown('fast');
    $("#mensaje center p").attr('class', contexto);
    $("#mensaje center p").html(img + "/>  " + mensaje);
    setTimeout(function() {$("#mensaje").fadeOut('slow');},3000);
}
