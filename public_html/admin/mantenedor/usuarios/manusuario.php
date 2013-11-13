<?php
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: ../../procesos/logout.php');
}
if(isset($_POST['Id']) && $_POST['Id'] != 'null' && (int)$_POST['Id'] != 0)
{
    include "../../procesos/conectar.php";
    $nombre = $_POST['nombre'];
    $login = $_POST['login'];
    $estado = $_POST['estado'];
    $query = "update usuario set nombre = '".$nombre."', login = '".$login."', estado = ".$estado." where id = ".$_POST['Id'].";";

    mysql_query($query);
    $num = mysql_affected_rows();
    mysql_close($con);
    if($num == 1)
    {
        header('Location: inicio.php?m=uok');
    }
    else
    {
        header('Location: inicio.php?m=f');
    }
}
else
{
    include "../../procesos/conectar.php";
    $nombre = $_POST['nombre'];
    $login = $_POST['login'];
    $pass = strtolower($_POST['pass']);
    $estado = $_POST['estado'];
    $query = "insert into usuario values(null, '".$nombre."', '".$login."', '".$pass."', ".$estado.");";

    mysql_query($query);
    $num = mysql_affected_rows();
    mysql_close($con);
    if($num == 1)
    {
        header('Location: inicio.php?m=iok');
    }
    else
    {
        header('Location: inicio.php?m=f');
    }
}
?>