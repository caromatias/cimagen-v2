<?php
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: ../../procesos/logout.php');
}
if(isset($_POST['Id']) && $_POST['Id'] != 'null' && (int)$_POST['Id'] != 0)
{
    if(isset($_FILES['imagen']['size']) && $_FILES['imagen']['size'] != '')
    {
        //Imagen
        $satatusIm = "";
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $correo = $_POST['correo'];
        //obtencion de los datos del archivo
        $tamñoIm = $_FILES["imagen"]['size'];
        $tipoIm = $_FILES["imagen"]['type'];
        $archivoIm = $_FILES["imagen"]['name'];
        $prefijoIm = substr(md5(uniqid(rand())),0,6);

        if ($archivoIm != "") {
            // guardamos el archivo a la carpeta recursos/imagenes
            $destinoIm =  "../../../recursos/periodistas/".$prefijoIm."_".$archivoIm;
            $destinoImTu = "../../../recursos/periodistas/thumbs/".$prefijoIm."_".$archivoIm;
            if (copy($_FILES['imagen']['tmp_name'],$destinoIm)) {
                $statusIm = "Archivo subido: <b>".$archivoIm."</b>";

                include "../eventos/thumbs.php";
                crear_Thumbnail($destinoIm, 200, 319, 80, $destinoImTu);
                include "../../procesos/conectar.php";
                $instruccion = "update periodista set nombre = '".$nombre."',imagen = '".$destinoImTu."', estado = ".$estado.", correo = '".$correo."'  where id = ".$_POST['Id'].";";
                $resul = mysql_query($instruccion) or die ("Problema en la consulta");
                if($resul == true)
                {
                    //unlink($_POST['antiguaT']);
                    //unlink($_POST['antiguaI']);
                    header('Location: inicio.php?m=uok');
                }
                else
                {
                    unlink($destinoIm);
                    unlink($destino);
                    header('Location: inicio.php?m=f');
                }
            } else {
                $statusIm = "Error al subir el archivo";
                echo $satatusIm;
            }
        } else {
            $statusIm = "Error al subir archivo";
            echo $satatusIm;
        }
    }
    else
    {
        include "../../procesos/conectar.php";
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $correo = $_POST['correo'];
        $query = "update periodista set nombre = '".$nombre."',estado = ".$estado.",correo = '".$correo."' where id = ".$_POST['Id'].";";
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

}
else
{
    ////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //Imagen
    $satatusIm = "";
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $correo = $_POST['correo'];
    //obtencion de los datos del archivo
    $tamñoIm = $_FILES["imagen"]['size'];
    $tipoIm = $_FILES["imagen"]['type'];
    $archivoIm = $_FILES["imagen"]['name'];
    $prefijoIm = substr(md5(uniqid(rand())),0,6);

    if ($archivoIm != "") {
        // guardamos el archivo a la carpeta recursos/imagenes
        $destinoIm =  "../../../recursos/periodistas/".$prefijoIm."_".$archivoIm;
        $destinoImTu = "../../../recursos/periodistas/thumbs/".$prefijoIm."_".$archivoIm;
        if (copy($_FILES['imagen']['tmp_name'],$destinoIm)) {
            $statusIm = "Archivo subido: <b>".$archivoIm."</b>";

            include "../eventos/thumbs.php";
            crear_Thumbnail($destinoIm, 200, 400, 80, $destinoImTu);
            include "../../procesos/conectar.php";
            $instruccion = "insert into periodista (nombre, imagen, estado, correo) values ('".$nombre."', '".$destinoImTu."', ".$estado.", '".$correo."');";
            $resul = mysql_query($instruccion) or die ("Problema en la consulta");
            if($resul == true)
            {
                header('Location: inicio.php?m=iok');
            }
            else
            {
                unlink($destinoIm);
                unlink($destino);
                header('Location: inicio.php?m=f');
            }
        } else {
            $statusIm = "Error al subir el archivo";
            echo $satatusIm;
        }
    } else {
        $statusIm = "Error al subir archivo";
        echo $satatusIm;
    }
}
?>