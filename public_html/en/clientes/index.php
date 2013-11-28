<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/est.css">
    <script type="text/javascript" src="../../js/global.js"></script>
    <script type="text/javascript" src="../../js/jquery-latest.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript">
        function menu()
        {
            document.getElementById('clientes').className = "tdmenucact";
            //document.getElementById('actuales').className = 'vertical_css3 submen2act';
        }
        function muestra(id)
        {
            document.getElementById(id).style.display = "block";
        }
        function nom(id)
        {
            document.getElementById(id).style.display = "none";
        }
        function ima(ruta)
        {
            document.getElementById('fotoGrande').src = ruta;
            $('#foto').fadeIn('slow');
        }
    </script>
</head>
<body onload="menu();" oncontextmenu="return true;">
<div id="contenedorPrimario" style="position: relative;">
    <div id="foto" style="position: absolute; background: rgba(0, 0, 0, 0.5); width: 450px; height: 535px; left: 550px;top: 145px;z-index: 1;display: none;">
        <center>
            <div style="float: right; width: 22px">
                <label style="font-family: nunito, san-serif; font-size: 20px; color: #FFFFFF; cursor: pointer;" onclick="$('#foto').fadeOut('slow');">
                    Close
                </label>
            </div>
            <table cellspacing="10" cellpadding="20">
                <tr>
                    <td>
                        <img style="border: 3px solid #FFFFFF;" id="fotoGrande" src="../../recursos/eventos/8abcee_relajacionazul.jpg" width="360" height="460"/>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <img src="../../recursos/14ans.jpg" style="position: absolute;margin: 10px 0px 0px 40px;">
    <div id="titulo" style="position: relative;">
        <br/>
        <img src="../../recursos/logos/5.jpg" style="padding-top: 6px;">
    </div>

    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table border="0px" style="height: 332px; border-collapse: separate;
  border-spacing: 5px;position: absolute;top: 158px; left: -5px;
  border-collapse: expression('separate', cellSpacing = '5px');">
                    <tr>
                        <td id="quienesSomos" class="tdmenu" valign="bottom" style="width: 42px;"onclick="window.location.href = '../home.html#qs';">
                            <div style="position: relative; width: 42px;">
                                <div style="position: absolute; top: -80px; left: 7px;">
                                    <h4 class="vertical_css3 menuColor">WHO WE ARE</h4>
                                </div>
                            </div>
                        </td>
                        <td class="tdmenue" style="width: 42px;" onclick="window.location.href = '../equipo.html';">
                            <div style="position: relative; width: 42px;">
                                <div style="position: absolute; top: -80px; left: 7px;">
                                    <h4 class="vertical_css3 menuColor">TEAM</h4>
                                </div>
                            </div>
                        </td>
                        <td id="servicios" class="tdmenus" style="width: 42px;" onclick="window.location.href = '../servicios.html';">
                            <div style="position: relative; width: 42px;">
                                <div style="position: absolute; top: -80px; left: 7px;">
                                    <h4 class="vertical_css3 menuColor">SERVICES</h4>
                                </div>
                            </div>
                        </td>
                        <td id="portafolio" class="tdmenup" style="width: 42px;" onclick="window.location.href = '../portafolio/';">
                            <div style="position: relative; width: 42px;">
                                <div style="position: absolute; top: -80px; left: 7px;">
                                    <h4 class="vertical_css3 menuColor">PORTFOLIO</h4>
                                </div>
                            </div>
                        </td>
                        <td id="clientes" class="tdmenuc" style="width: 42px;" onclick="window.location.href = '../clientes/'">
                            <div style="position: relative; width: 42px;">
                                <div style="position: absolute; top: -80px; left: 7px;">
                                    <h4 class="vertical_css3 menuColor">CUSTOMERS</h4>
                                </div>
                            </div>
                        </td>
                        <td class="tdmenuco" style="width: 42px;" onclick="window.location.href = '../contacto.html';">
                            <div style="position: relative; width: 42px;">
                                <div style="position: absolute; top: -80px; left: 7px;">
                                    <h4 class="vertical_css3 menuColor">CONTACT</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <div>
                    <table border="0px" style="width: 700px; height: 320px;position: absolute;top: 10px;left: 275px;">
                        <tbody>
                        <tr>
                            <td style="width: 65px; vertical-align: bottom;">
                                <table border="0px" style="width: 65px; hie">
                                    <tbody>
                                    <tr>
                                        <td style="vertical-align: bottom;">

                                        </td>
                                        <td>
                                            <a href="?acl=actuales">
                                                <h1 id="actuales" class="vertical_css3 submen2">Current</h1>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="?acl=antiguos">
                                                <h1 id="antigua" class="vertical_css3 submen2">Tambien&nbsp;confiaron&nbsp;en&nbsp;nosotras</h1>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <?php
                                /*
                                include "../admin/procesos/conectar.php";
                                $query = "select id, nombre, ruta from cliente where estado = 1;";
                                $resul = mysql_query($query);
                                mysql_close($con);
                                $tEventos = "";
                                if($resul == true)
                                {
                                    $contador = 1;
                                    while($reg = mysql_fetch_array($resul))
                                    {
                                        if($contador == 1 || $contador == 5 || $contador == 9 || $contador == 13 || $contador == 17)
                                        {
                                            $tEventos.= "<tr>";
                                        }
                                        $tEventos.= "<td style='vertical-align: top; text-align: center; border: 1px solid #000000;'>
                                                                <img src='".substr($reg[2], 6)."' style='cursor: pointer;width: 110px; height: 28px;'/>
                                                                <br>
                                                             </td>";
                                        if($contador == 4 || $contador == 8 || $contador == 12 || $contador == 16)
                                        {
                                            $tEventos.= "</tr>";
                                        }
                                        $contador = $contador +1;
                                    }
                                }
                                */
                                ?>
                                <div id="contenido" style="position: absolute; top: 145px;">
                                    <!--
                                    <table cellspacing="5" cellpadding="10" border="0px">
                                        <?php //echo $tEventos; ?>
                                    </table>
                                    -->
                                    <?php
                                    if(isset($_GET['acl']))
                                    {
                                        if($_GET['acl'] == "actuales")
                                        {
                                            include "paginador.php";
                                        }
                                        else if($_GET['acl'] == "antiguos")
                                        {
                                            include "paginadorAn.php";
                                        }
                                        else
                                        {
                                            include "paginador.php";
                                        }
                                    }
                                    else
                                    {
                                        include "paginador.php";
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="vertical-align: bottom;text-align: center;position: absolute;width: 100%;top: 645px;left: -5px;">
                <label style="font-size: 13px;font-family: miFuente;position: absolute;left: 283px;">DON CARLOS 3171, OF B / LAS CONDES, STGO / TEL: (56 2) 2249 76 55 - (56 2) 2245 10 83</label>
                <div style="float: right; margin-right: 15px;">
                    <img src="../recursos/img/f_logo.png" title="Facebook" style="width: 28px; height: 28px;">
                    <img src="../recursos/img/twitter.png" title="Twitter" style="width: 28px; height: 28px;">
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
<?php

if(isset($_GET['acl']))
{
    if($_GET['acl'] == "actuales")
    {
        echo "<script type='text/javascript'>document.getElementById('actuales').className = 'vertical_css3 submen2act';document.getElementById('antigua').className = 'vertical_css3 submen2';</script>";
    }
    else if($_GET['acl'] == "antiguos")
    {
        echo "<script type='text/javascript'>document.getElementById('antigua').className = 'vertical_css3 submen2act';document.getElementById('actuales').className = 'vertical_css3 submen2';</script>";
    }
}
else
{
    echo "<script type='text/javascript'>document.getElementById('actuales').className = 'vertical_css3 submen2act';document.getElementById('antigua').className = 'vertical_css3 submen2';</script>";
}
?>