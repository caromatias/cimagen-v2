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
        //obtencion de los datos del archivo
        $tamñoIm = $_FILES["imagen"]['size'];
        $tipoIm = $_FILES["imagen"]['type'];
        $archivoIm = $_FILES["imagen"]['name'];
        $prefijoIm = substr(md5(uniqid(rand())),0,6);

        if ($archivoIm != "") {
            // guardamos el archivo a la carpeta recursos/imagenes
            $destinoIm =  "../../../recursos/eventos/".$prefijoIm."_".$archivoIm;
            $destinoImTu = "../../../recursos/eventos/thumbs/".$prefijoIm."_".$archivoIm;
            if (copy($_FILES['imagen']['tmp_name'],$destinoIm)) {
                $statusIm = "Archivo subido: <b>".$archivoIm."</b>";

                include "thumbs.php";
                crear_Thumbnail($destinoIm, 150, 150, 80, $destinoImTu);
                include "../../procesos/conectar.php";
                $instruccion = "update evento set nombre = '".$nombre."', rutaImg = '".$destinoIm."', rutaThumb = '".$destinoImTu."', estado = ".$estado."  where id = ".$_POST['Id'].";";
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
        include "../../procesos/conectar.php";
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $query = "update evento set nombre = '".$nombre."', estado = ".$estado." where id = ".$_POST['Id'].";";
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

    if ($archivoIm != "") {
        // guardamos el archivo a la carpeta recursos/imagenes
        $destinoIm =  "../../../recursos/eventos/".$prefijoIm."_".$archivoIm;
        $destinoImTu = "../../../recursos/eventos/thumbs/".$prefijoIm."_".$archivoIm;
        if (copy($_FILES['imagen']['tmp_name'],$destinoIm)) {
            $statusIm = "Archivo subido: <b>".$archivoIm."</b>";

            include "thumbs.php";
            crear_Thumbnail($destinoIm, 150, 150, 80, $destinoImTu);
            include "../../procesos/conectar.php";

            $imagenesVarias = "";
            $rutasImagenesVarias = "";
            if($_POST['cuan'] == 5)
            {
                $img1 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img0"]['name'];
                $img2 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img1"]['name'];
                $img3 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img2"]['name'];
                $img4 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img3"]['name'];
                $img5 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img4"]['name'];
                if(copy($_FILES['img0']['tmp_name'],$img1))
                {
                    if(copy($_FILES['img1']['tmp_name'],$img2))
                    {
                        if(copy($_FILES['img2']['tmp_name'],$img3))
                        {
                            if(copy($_FILES['img3']['tmp_name'],$img4))
                            {
                                if(copy($_FILES['img4']['tmp_name'],$img5))
                                {
                                    $imagenesVarias = ", img1, img2, img3, img4, img5";
                                    $rutasImagenesVarias = ",'".$img1."','".$img2."','".$img3."','".$img4."','".$img5."'";
                                }
                            }
                        }
                    }
                }
            }
            else if($_POST['cuan'] == 4)
            {
                $img1 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img0"]['name'];
                $img2 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img1"]['name'];
                $img3 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img2"]['name'];
                $img4 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img3"]['name'];
                if(copy($_FILES['img0']['tmp_name'],$img1))
                {
                    if(copy($_FILES['img1']['tmp_name'],$img2))
                    {
                        if(copy($_FILES['img2']['tmp_name'],$img3))
                        {
                            if(copy($_FILES['img3']['tmp_name'],$img4))
                            {
                                $imagenesVarias = ", img1, img2, img3, img4";
                                $rutasImagenesVarias = ",'".$img1."','".$img2."','".$img3."','".$img4."'";
                            }
                        }
                    }
                }
            }
            else if($_POST['cuan'] == 3)
            {
                $img1 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img0"]['name'];
                $img2 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img1"]['name'];
                $img3 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img2"]['name'];
                if(copy($_FILES['img0']['tmp_name'],$img1))
                {
                    if(copy($_FILES['img1']['tmp_name'],$img2))
                    {
                        if(copy($_FILES['img2']['tmp_name'],$img3))
                        {
                            $imagenesVarias = ", img1, img2, img3";
                            $rutasImagenesVarias = ",'".$img1."','".$img2."','".$img3."'";
                        }
                    }
                }
            }
            else if($_POST['cuan'] == 2)
            {
                $img1 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img0"]['name'];
                $img2 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img1"]['name'];
                if(copy($_FILES['img0']['tmp_name'],$img1))
                {
                    if(copy($_FILES['img1']['tmp_name'],$img2))
                    {
                        $imagenesVarias = ", img1, img2";
                        $rutasImagenesVarias = ",'".$img1."','".$img2."'";
                    }
                }
            }
            else if($_POST['cuan'] == 1)
            {
                $img1 = "../../../recursos/eventos/".$prefijoIm."_".$_FILES["img0"]['name'];
                if(copy($_FILES['img0']['tmp_name'],$img1))
                {
                    $imagenesVarias = ", img1";
                    $rutasImagenesVarias = ",'".$img1."'";
                }
            }


            $instruccion = "insert into evento (nombre, rutaImg, rutaThumb, estado".$imagenesVarias.") values ('".$nombre."', '".$destinoIm."', '".$destinoImTu."', ".$estado.$rutasImagenesVarias.");";
            $resul = mysql_query($instruccion) or die ($instruccion);
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