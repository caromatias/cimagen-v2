<?php
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: ../../procesos/logout.php');
}
if(!isset($_GET['idu']) || (int)$_GET['idu'] != 0)
{
    include "../../procesos/conectar.php";
    $query = "select id, nombre,rutaImg, rutaThumb, estado, rutaPdf from publicaciones where id = ".$_GET['idu'].";";
    $res = mysql_query($query);
    mysql_close($con);
    if(mysql_num_rows($res) == 1)
    {
        if($reg = mysql_fetch_array($res))
        {
            echo $reg[0].";".$reg[1].";".$reg[2].";".$reg[3].";".$reg[4].";".$reg[5].";";
        }
        else
        {
            echo "NOT";
        }
    }
    else
    {
        echo "NOT";
    }
}
else
{
    echo "NOT";
}
?>