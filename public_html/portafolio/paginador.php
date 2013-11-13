<?php
require('../admin/procesos/conectar.php');
$RegistrosAMostrar=6;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
    $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
    $PagAct=$_GET['pag'];
    //caso contrario los iniciamos
}else{
    $RegistrosAEmpezar=0;
    $PagAct=1;
}

/*
$Resultado=mysql_query("SELECT * FROM empleado ORDER BY nombres LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$con);
echo "<table border='1px'>";
while($MostrarFila=mysql_fetch_array($Resultado)){
    echo "<tr>";
    echo "<td>".$MostrarFila['nombres']."</td>";
    echo "<td>".$MostrarFila['departamento']."</td>";
    echo "<td>".$MostrarFila['sueldo']."</td>";
    echo "</tr>";
}
echo "</table>";
*/
$query = "select id, nombre, rutaImg, rutaThumb, img1, img2, img3, img4,img5 from evento where estado = 1 order by id desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar;";
$resultado = mysql_query($query);
$contador = 1;
$cantidad = "";
$contadorResul = 1;
$urls = "";
if($resultado == true)
{
    echo "<div style='width: 100%; height: 322px;'><table cellspacing='0' cellpadding='0' border='0px' style='width: 100%;'><tbody><tr>";
    while($reg = mysql_fetch_array($resultado))
    {
        echo "<td style='vertical-align: top; text-align: center;'>
                                                                <!--<img id='resul".$contadorResul."' src='".substr($reg[2], 6)."' style='display: none;cursor: pointer;width: 111px; height: 322px;' onclick=\"ima('".$urls."','".$cantidad."');\" onmouseover='muestra(".$reg[0].");' onmouseout='nom(".$reg[0].");';/>-->
                                                                <a class='group".$contadorResul." cboxElement' href='".substr($reg[4], 6)."'>
                                                                    <img id='resul".$contadorResul."' src='".substr($reg[2], 6)."' style='display: none;cursor: pointer;width: 111px; height: 322px;' onmouseover='muestra(".$reg[0].");' onmouseout='nom(".$reg[0].");';/>
                                                                </a>
                                                                <br>
                                                                <div id='".$reg[0]."' style='display: none;'><center><div class='triangulo_inf'>.</div><label style='font-size: 14px;;font-family: 'Sintony', sans-serif;'>".$reg[1]."</label></center></div>";
        for($i = 5; $i <= 8; $i++)
        {
            if($reg[$i] != "")
            {
                $urls.= $reg[$i].";";
                $cantidad = $cantidad +1;
                echo "<a class='group".$contadorResul." cboxElement' href='".substr($reg[$i],6)."'>

                        </a>";
            }
        }
        echo "</td>";
        $cantidad = "";
        $contadorResul = $contadorResul+ 1;
    }
    echo "</tr></tbody></table></div><br/>";
}
else
{
    echo "No hay resultados.";
}

//******--------determinar las páginas---------******//
$NroRegistros=mysql_num_rows(mysql_query("select id, nombre, rutaImg from evento where estado = 1",$con));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
//echo "<center><a href=\"javascript: Pagina('1')\">Primero</a>";

echo "<table style='width: 100%;'><tr><td style='width: 95%;'>";
//echo "<center><button class='button' value='Primera' onclick=\"Pagina('1')\">Primera</button>";
if($PagAct>1) echo "<td id='antes' style='display: none;' class='triangulo_izq_por tooltip' onclick='Pagina(".$PagAnt.")'><span>Anterior</span></td>";
//echo "<a href=\"javascript: Pagina('$PagAnt')\">Anterior</a> ";
//echo "<strong> Pagina ".$PagAct." de ".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo "<td id='sigue' style='display: none;' class='triangulo_der_por tooltip' onclick='Pagina(".$PagSig.")'><span>Siguiente</span></td>";
//echo " <a href=\"javascript: Pagina('$PagSig')\">Siguiente</a> ";
//echo "<a href=\"javascript: Pagina('$PagUlt')\">Ultimo</a></center>";
//echo "<button class='button' value='Ultima' onclick='Pagina(".$PagUlt.")'>Ultima</button></center>";
echo "</tr></table>";
?>