<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../procesos/logout.php');
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/globales.css">
    <script type='text/javascript' src='../../js/jquery-latest.js'></script>
    <script type='text/javascript' src='../../js/global.js'></script>
    <script type="text/javascript">
        function actIframe()
        {
            if(window.location.hash != '')
            {
                qclass();
                switch(window.location.hash.substring(1))
                {
                    case 'usuarios':
                        $('#iframe').attr('src', 'usuarios/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'eventos':
                        $('#iframe').attr('src', 'eventos/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'clientes':
                        $('#iframe').attr('src', 'clientes/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'publicaciones':
                        $('#iframe').attr('src', 'publicaciones/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'gestion':
                        $('#iframe').attr('src', 'gestion/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'periodistas':
                        $('#iframe').attr('src', 'periodistas/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'asociadas':
                        $('#iframe').attr('src', 'asociadas/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                    case 'ayuda':
                        $('#iframe').attr('src', 'ayuda/inicio.php');
                        $('#dragdrop').attr('class', 'current');
                        break;
                }
            }
            else
            {
                $('#iframe').attr('src', 'usuarios/inicio.php');
                $('#dragdrop').attr('class', 'current');
            }
        }

        function qclass()
        {
            $('ul li').attr('class', '');
        }

        function srcIframe(url)
        {
            window.location = "#" + url;
            actIframe();
        }
    </script>
</head>
<body onload="ocargando(); actIframe();">
    <div style="width: 1000px; height: 99%; margin: 0 auto;">
        <div class="barraLat" style="width: 200px; height: 100%; float: left;">
            <table border="0px" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('usuarios');">
                            Usuarios
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('eventos');">
                            Eventos
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('publicaciones');">
                            Publicaciones
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('gestion');">
                            Gestion de prensa
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('clientes');">
                            Clientes
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('periodistas');">
                            Periodistas
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('asociadas');">
                            Asociadas
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="srcIframe('ayuda');">
                            Ayuda
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 40px;" class="tbLat" onclick="window.location.href='../procesos/logout.php';">
                            Cerrar sesion
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 790px; height: 100%;float: right;">
            <iframe id="iframe" style="width: 100%; height: 100%;" frameborder="0">

            </iframe>
        </div>
    </div>
</body>
</html>