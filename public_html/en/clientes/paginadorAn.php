<?php
require('../admin/procesos/conectar.php');
$RegistrosAMostrar=20;

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
$query = "select id, nombre, ruta from cliente where estado = 1 and tiempo = 1 order by id desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar;";
$resultado = mysql_query($query);
$contador = 1;
if($resultado == true)
{
    echo "<div style='width: 100%; height: 322px;'><table cellspacing='11' cellpadding='10' border='0px'>";
    while($reg = mysql_fetch_array($resultado))
    {
        if($contador == 1 || $contador == 5 || $contador == 9 || $contador == 13 || $contador == 17)
        {
            echo "<tr>";
        }
        echo "<td style='vertical-align: top;width: 110px; height: 28px; text-align: center; border: 1px solid rgb(192, 192, 192);'>
                                                                <img src='".substr($reg[2], 6)."' style='cursor: pointer;width: 110px; height: 28px;'/>
                                                                <br>
                                                             </td>";
        if($contador == 4 || $contador == 8 || $contador == 12 || $contador == 16)
        {
            echo "</tr>";
        }
        $contador = $contador +1;
    }
    echo "</table></div>";
}
else
{
    echo "No hay resultados.";
}

//******--------determinar las páginas---------******//
$NroRegistros=mysql_num_rows(mysql_query("select id, nombre, ruta from cliente where estado = 1 and tiempo = 1;",$con));
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


//echo "<center><button class='button' value='Primera' onclick=\"Pagina('1')\">Primera</button>";
if($PagAct>1) echo "<table><tr><td style='height: 12px;'></td></tr><tr><td style='width: 510px;'></td><td class='triangulo_izq_cli' onclick='PaginaAn(".$PagAnt.")'></td></tr></table>";
//echo "<a href=\"javascript: Pagina('$PagAnt')\">Anterior</a> ";
//echo "<strong> Pagina ".$PagAct." de ".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo "<table><tr><td style='height: 12px;'></td></tr><tr><td style='width: 510px;'></td><td class='triangulo_der_cli' onclick='PaginaAn(".$PagSig.")'></td></tr></table>";
//echo " <a href=\"javascript: Pagina('$PagSig')\">Siguiente</a> ";
//echo "<a href=\"javascript: Pagina('$PagUlt')\">Ultimo</a></center>";
//echo "<button class='button' value='Ultima' onclick='Pagina(".$PagUlt.")'>Ultima</button></center>";
?>