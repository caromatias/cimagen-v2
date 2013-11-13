<?php
session_start();
include "conectar.php";
$varia = md5($_POST['pass']);
$query = "select * from usuario where login = '".$_POST['usuario']."' and contrasena = '".$varia."';";
$res = mysql_query($query);
$num = mysql_num_rows($res);
if($num > 0)
{
    while($nDatos = mysql_fetch_array($res))
    {
        $_SESSION['nombre'] = $nDatos['nombre'];
        $_SESSION['id'] = $nDatos['id'];
        header("Location: ../mantenedor/");
    }
    //$_SESSION['Nombre'] = true;

}
else
{
    header("Location: ../index.html?err01");
}
?>