<?php
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: ../../procesos/logout.php');
}
if(isset($_POST['Id']) && $_POST['Id'] != 'null' && (int)$_POST['Id'] != 0)
{
    if(isset($_FILES['imagen']['size']) && $_FILES['imagen']['size'] != '' && isset($_FILES['pdf']['size']) && $_FILES['pdf']['size'] != '')
    {
        //Imagen
        $satatusIm = "";
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        //obtencion de los datos del archivo
        $tamñoIm = $_FILES["imagen"]['size'];
        $tipoIm = $_FILES["imagen"]['type'];
        $archivoIm = $_FILES["imagen"]['name'];
        $prefijoIm = substr(md5(uniqid(rand())),0,6);
        // obtenemos los datos del archivo
        $tamano = $_FILES["pdf"]['size'];
        $tipo = $_FILES["pdf"]['type'];
        $archivo = $_FILES["pdf"]['name'];
        $prefijo = substr(md5(uniqid(rand())),0,6);

        if ($archivo != "") {
            // guardamos el archivo a la carpeta recursos/pdf
            $destino =  "../../../recursos/gestion/pdfs/".$prefijo."_".$archivo;
            if (copy($_FILES['pdf']['tmp_name'],$destino)) {
                $status = "Archivo subido: <b>".$archivo."</b>";

                if ($archivoIm != "") {
                    // guardamos el archivo a la carpeta recursos/imagenes
                    $destinoIm =  "../../../recursos/gestion/".$prefijoIm."_".$archivoIm;
                    $destinoImTu = "../../../recursos/gestion/thumbs/".$prefijoIm."_".$archivoIm;
                    if (copy($_FILES['imagen']['tmp_name'],$destinoIm)) {
                        $statusIm = "Archivo subido: <b>".$archivoIm."</b>";

                        include "../publicaciones/thumbs.php";
                        crear_Thumbnail($destinoIm, 150, 150, 80, $destinoImTu);
                        include "../../procesos/conectar.php";
                        $instruccion = "update gestion set nombre = '".$nombre."', rutaImg = '".$destinoIm."', rutaThumb = '".$destinoImTu."', estado = ".$estado.", rutaPdf = '".$destino."'  where id = ".$_POST['Id'].";";
                        $resul = mysql_query($instruccion) or die ("Problema en la consulta");
                        if($resul == true)
                        {
                            unlink($_POST['antiguaT']);
                            unlink($_POST['antiguaI']);
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
                $statusIm = "Error al subir el archivo";
                echo $satatusIm;
            }
        }
        else
        {
            $statusIm = "Error al subir el archivo";
            echo $satatusIm;
        }
    }
    else
    {
        include "../../procesos/conectar.php";
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $query = "update gestion set nombre = '".$nombre."', estado = ".$estado." where id = ".$_POST['Id'].";";
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
    //obtencion de los datos del archivo
    $tamñoIm = $_FILES["imagen"]['size'];
    $tipoIm = $_FILES["imagen"]['type'];
    $archivoIm = $_FILES["imagen"]['name'];
    $prefijoIm = substr(md5(uniqid(rand())),0,6);
    // obtenemos los datos del archivo
    $tamano = $_FILES["pdf"]['size'];
    $tipo = $_FILES["pdf"]['type'];
    $archivo = $_FILES["pdf"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);

    if ($archivo != "") {
        // guardamos el archivo a la carpeta recursos/pdf
        $destino =  "../../../recursos/gestion/pdfs/".$prefijo."_".$archivo;
        if (copy($_FILES['pdf']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";

            if ($archivoIm != "") {
                // guardamos el archivo a la carpeta recursos/imagenes
                $destinoIm =  "../../../recursos/gestion/".$prefijoIm."_".$archivoIm;
                $destinoImTu = "../../../recursos/gestion/thumbs/".$prefijoIm."_".$archivoIm;
                if (copy($_FILES['imagen']['tmp_name'],$destinoIm)) {
                    $statusIm = "Archivo subido: <b>".$archivoIm."</b>";

                    include "../publicaciones/thumbs.php";
                    crear_Thumbnail($destinoIm, 150, 150, 80, $destinoImTu);
                    include "../../procesos/conectar.php";
                    $instruccion = "insert into gestion (nombre, rutaImg, rutaThumb, estado, rutaPdf) values ('".$nombre."', '".$destinoIm."', '".$destinoImTu."', ".$estado.", '".$destino."');";
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
        else
        {
            $statusIm = "Error al subir el archivo";
            echo $satatusIm;
        }
    }
}
?>