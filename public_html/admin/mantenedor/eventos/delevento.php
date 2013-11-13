<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../../procesos/logout.php');
}
if(isset($_POST['Id']) && $_POST['Id'] != 'null' && (int)$_POST['Id'] != 0)
{
        include "../../procesos/conectar.php";
        $query = "delete from evento where  id = ".$_POST['Id'].";";
        mysql_query($query);
        if(mysql_affected_rows() == 1)
        {
            mysql_close($con);
            header('Location: inicio.php?m=dok');
        }
        else
        {
            mysql_close($con);
            header('Location: inicio.php?m=f');
        }
}
else
{
    header('Location: inicio.php?m=f');
}
?>