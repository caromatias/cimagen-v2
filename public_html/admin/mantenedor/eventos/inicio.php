<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../../procesos/logout.php');
}
include "../../procesos/conectar.php";
$query = "select * from evento;";
$res = mysql_query($query);
mysql_close($con);
if(mysql_num_rows($res) > 0)
{
    $tEventos = "";
    while($reg = mysql_fetch_array($res))
    {
        $style = "";
        if((int)$reg[4] == 1)
        {
            $estado = 'Activo';
        }
        else
        {
            $estado = 'Inactivo';
            $style = "style='color:red;'";
        }
        $tEventos.="	<tr ".$style." onclick=\"window.location = 'inicio.php#".$reg[0]."';pasaUsuario();\" onContextMenu=\" menuTrUsuario(".$reg[0].");\";>
								<td>
									".$reg[0]."
								</td>
								<td>
									".$reg[1]."
								</td>
								<td>
									<img src='".$reg[3]."' style='width: 100px; height: 60px;' />
								</td>
								<td>
									<form action='delevento.php' method='post' id='fdu".$reg[0]."'><input type='hidden' value='".$reg[0]."' name='Id'/></form>
									".$estado."
								</td>
							</tr>";
    }
}
else
{
    $tEventos = "	<tr>
							<td align='center'>
								Ninguno
							</td>
						</tr>";
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="../../../js/jquery-latest.js"></script>
    <script type="text/javascript" src="../../../js/global.js"></script>
    <script type="text/javascript" src="../../../js/menu.js"></script>
    <script type="text/javascript" src="../../../js/regular.js"></script>
    <script type="text/javascript" src="../../../js/md5.js"></script>
    <link href="../../../css/global.css" rel="stylesheet" type="text/css"/>
    <link href="../../../css/menu.css" rel="stylesheet" type="text/css"/>
    <style>
        .tablaLista tr td
        {
            padding-right:35px;
        }
        .tablaLista tr
        {
            cursor:pointer;
        }
    </style>
    <script type="text/javascript">
        function pasaUsuario()
        {
            if(window.location.hash != '')
            {
                mcargando();
                var usr = window.location.hash.substring(1);
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        if(xmlhttp.responseText == 'NOT')
                        {
                            alert('Error al ejecutar.');
                            window.location = 'inicio.php#';
                        }
                        else
                        {
                            var arreglo = xmlhttp.responseText.split(';');
                            if(arreglo[4] == '0')
                            {
                                document.getElementById('rcero').checked = true;
                            }
                            else
                            {
                                document.getElementById('runo').checked = true;
                            }
                            document.getElementById('btNuevo').disabled = false;
                            $("#sNombreUsuario").html(arreglo[1]);
                            $("#hId").val(arreglo[0]);
                            document.getElementById('tbDetalles').childNodes[1].childNodes[2].childNodes[1].innerHTML = arreglo[0];
                            document.getElementById('tbDetalles').childNodes[1].childNodes[4].childNodes[1].innerHTML = "<input type='text' name='nombre' required='true' value='" + arreglo[1] + "'/>";
                            document.getElementById('tbDetalles').childNodes[1].childNodes[6].childNodes[1].innerHTML = "<img src='"+ arreglo[3] +"' /><br/><input type='file' name='imagen' id='imagen'/>";
                        }
                        $("#tbDetalles").slideDown('fast');
                        ocargando();
                    }
                }
                xmlhttp.open("GET",'agetevento.php?idu=' + usr,true);
                xmlhttp.send();
            }
            else
            {
                ocargando();
            }
        }

        function nuevoUsuario()
        {
            $("#sNombreUsuario").html('Nuevo Evento');
            $("#hId").val('');
            document.getElementById('tbDetalles').childNodes[1].childNodes[2].childNodes[1].innerHTML = 'Nuevo';
            document.getElementById('tbDetalles').childNodes[1].childNodes[4].childNodes[1].innerHTML = "<input type='text' name='nombre' required title='Debe ingresar un nombre' value=''/>";
            document.getElementById('tbDetalles').childNodes[1].childNodes[6].childNodes[1].innerHTML = "<input type='file' required title='Debe subir una imagen' name='imagen' id='imagen'/> ";
            document.getElementById('runo').checked = true;
            document.getElementById('btNuevo').disabled = true;
            $("#tbDetalles").slideDown('fast');
        }

        function menuTrUsuario(id)
        {
            $("#menu ul").html("<li onclick=\" window.location = 'inicio.php#" + id + "';pasaUsuario(); \">Editar</li>");
            $("#menu ul").html($("#menu ul").html() + "<li onclick=\" eliminarUser(" + id + "); \">Eliminar</li>");
        }

        function eliminarUser(id)
        {
            if(confirm('¿Realmente desea eliminar el evento ' + id + '?') == true)
            {
                document.getElementById('fdu' + id).submit();
            }
        }

        function menuDefecto()
        {
            $("#menu ul").html("<li onclick=\"nuevoUsuario();\">Nuevo Evento</li>");
            $("#menu ul").html($("#menu ul").html() + "<li onclick=\"location.reload();\">Actualizar</li>");
        }

        function passMd5()
        {
            if(document.getElementById('trContrasena').style.display == 'table-row')
            {
                document.fCreaUser.pass.value = calcMD5(document.getElementById('contrasena').value);
            }
        }
        function creaFiles(cantidad)
        {
            var files = '';
            var i;
            for(i = 0; i < cantidad; i++)
            {
                files+='<input type="file" id="img'+i+'" name="img'+i+'" required title="Debe seleccionar una imagen"/>';
            }
            document.getElementById('contFiles').innerHTML = files;

        }
    </script>
</head>
<body onLoad="pasaUsuario();">
<div id='mensaje' style='display:none;'>
    <center>
        <p class='bad'>o</p>
    </center>
</div>
<?php
if(isset($_GET['m']))
{
    switch($_GET['m'])
    {
        case 'iok':
            echo "<script>mensaje('ok', 'Evento creado correctamente.');</script>";
            break;
        case 'uok':
            echo "<script>mensaje('ok', 'Evento actualizado correctamente.');</script>";
            break;
        case 'dok':
            echo "<script>mensaje('ok', 'Evento eliminado correctamente.');</script>";
            break;
        case 'mua':
            echo "<script>mensaje('bad', 'No puede auto eliminarse.');</script>";
            break;
        case 'f':
            echo "<script>mensaje('bad', 'No se ha modificado ningún evento.');</script>";
            break;
    }
}
?>
<div id='cargando' onContextMenu="return false;">
    <center>
        <br /><br /><br /><br />
        <h1>Cargando...</h1>
    </center>
</div>
<!--
<div class='bartop'>
    <img src="../imagenes/sistema/system-software-update.png" title="Actualizar" onClick="location.reload();"/>
    <img src="../imagenes/sistema/document-new.png" title="Nuevo" onClick="nuevoUsuario();"/>
    <img src="../imagenes/sistema/help.png" title="Ayuda" style='position: fixed;top: 13px;right: 20px;' onClick="mcargando();window.parent.qclass();window.parent.document.getElementById('ayuda').setAttribute('class','current');window.location = '../ayuda/inicio.php#usuarios';"/>
</div>
-->
<div id="menu">
    <ul>
        <li onClick="nuevoUsuario();">Nuevo Evento</li>
        <li onClick="location.reload();">Actualizar</li>
    </ul>
</div>
<center>
    <h1>Administración de eventos</h1>
    <div>
        <center>
            <form action="manevento.php" method="post" name="fCreaUser" enctype="multipart/form-data">
                <table id='tbDetalles' style="display:none;">
                    <tr>
                        <th colspan="2">
                            <h3 id='sNombreUsuario'></h3>
                        </th>
                    </tr>
                    <tr><td>Id</td><td></td></tr>
                    <tr><td>Nombre</td><td></td></tr>
                    <tr><td>Imagen</td><td></td></tr>
                    <tr>
                        <td>
                            Cuantas imagenes
                        </td>
                        <td>
                            <select id="cuan" name="cuan" onchange="creaFiles(this.value);" style="width: 120px;">
                                <option value="0">Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div id="contFiles" style="width: 200px;">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Estado
                        </td>
                        <td>
                            <input type="radio" id='runo' name="estado" value="1" /> Activo<br />
                            <input type="radio" id='rcero' name="estado" value="0" /> Inactivo
                            <input type="hidden" id='hId' name='Id' value='null'/>
                            <input type="hidden" name='pass'/>
                        </td>
                    </tr>
                    <!--.$_POST['nombre']."', '".$_POST['login']."', '".$_POST['pass']."', ".$_POST['estado'].");";-->
                    <tr>
                        <td colspan="2" align="center">
                            <input type="button" class="button" value="Cancelar" onClick="window.location = 'inicio.php#';$('#tbDetalles').slideUp('fast');"/>
                            <input type="submit" class="button" value='Guardar'/>
                            <input type="button" class="button" id='btNuevo' value='Nuevo' onClick="nuevoUsuario();"/>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
    <br />
    <table class='tablaLista bordered'>
        <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                Nombre
            </th>
            <th>
                Imagen
            </th>
            <th>
                Estado
            </th>
        </tr>
        </thead>
        <tbody>
        <?php echo $tEventos; ?>
        </tbody>
    </table>
</center>
<br /><br /><br />
</body>
</html>