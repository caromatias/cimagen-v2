<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/est.css">
        <script type="text/javascript" src="../js/global.js"></script>
        <script type="text/javascript" src="../js/jquery-latest.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <link rel="stylesheet" href="../css/colorbox.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script src="../js/jquery.colorbox.js"></script>
        <script>
            $(document).ready(function() {
                //Examples of how to assign the ColorBox event to elements
                $(".group1").colorbox({rel: 'group1'});
                /*
                 $(".group2").colorbox({rel:'group2', transition:"fade"});
                 $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
                 $(".group4").colorbox({rel:'group4', slideshow:true});
                 */
                $(".group2").colorbox({rel: 'group2'});
                $(".group3").colorbox({rel: 'group3'});
                $(".group4").colorbox({rel: 'group4'});
                $(".group5").colorbox({rel: 'group5'});
                $(".group6").colorbox({rel: 'group6'});
                $(".ajax").colorbox();
                $(".youtube").colorbox({iframe: true, innerWidth: 425, innerHeight: 344});
                $(".vimeo").colorbox({iframe: true, innerWidth: 500, innerHeight: 409});
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
                $(".inline").colorbox({inline: true, width: "50%"});
                $(".callbacks").colorbox({
                    onOpen: function() {
                        alert('onOpen: colorbox is about to open');
                    },
                    onLoad: function() {
                        alert('onLoad: colorbox has started to load the targeted content');
                    },
                    onComplete: function() {
                        alert('onComplete: colorbox has displayed the loaded content');
                    },
                    onCleanup: function() {
                        alert('onCleanup: colorbox has begun the close process');
                    },
                    onClosed: function() {
                        alert('onClosed: colorbox has completely closed');
                    }
                });

                $('.non-retina').colorbox({rel: 'group5', transition: 'none'})
                $('.retina').colorbox({rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true});

                //Example of preserving a JavaScript event for inline calls.
                $("#click").click(function() {
                    $('#click').css({"background-color": "#f00", "color": "#fff", "cursor": "inherit"}).text("Open this window again and this message will still be here.");
                    return false;
                });
                setInterval(function (){set();},500);
            });
            
            function set(){
                $(".group1").colorbox({rel: 'group1'});
                /*
                 $(".group2").colorbox({rel:'group2', transition:"fade"});
                 $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
                 $(".group4").colorbox({rel:'group4', slideshow:true});
                 */
                $(".group2").colorbox({rel: 'group2'});
                $(".group3").colorbox({rel: 'group3'});
                $(".group4").colorbox({rel: 'group4'});
                $(".group5").colorbox({rel: 'group5'});
                $(".group6").colorbox({rel: 'group6'});
                $(".ajax").colorbox();
                $(".youtube").colorbox({iframe: true, innerWidth: 425, innerHeight: 344});
                $(".vimeo").colorbox({iframe: true, innerWidth: 500, innerHeight: 409});
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
                $(".inline").colorbox({inline: true, width: "50%"});
                $(".callbacks").colorbox({
                    onOpen: function() {
                        alert('onOpen: colorbox is about to open');
                    },
                    onLoad: function() {
                        alert('onLoad: colorbox has started to load the targeted content');
                    },
                    onComplete: function() {
                        alert('onComplete: colorbox has displayed the loaded content');
                    },
                    onCleanup: function() {
                        alert('onCleanup: colorbox has begun the close process');
                    },
                    onClosed: function() {
                        alert('onClosed: colorbox has completely closed');
                    }
                });

                $('.non-retina').colorbox({rel: 'group5', transition: 'none'})
                $('.retina').colorbox({rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true});

                //Example of preserving a JavaScript event for inline calls.
                $("#click").click(function() {
                    $('#click').css({"background-color": "#f00", "color": "#fff", "cursor": "inherit"}).text("Open this window again and this message will still be here.");
                    return false;
                });
            }
        </script>
        <script type="text/javascript">
            function menu()
            {
                document.getElementById('portafolio').className = "tdmenupact";
            }
            function muestra(id)
            {
                document.getElementById(id).style.display = "block";
            }
            function nom(id)
            {
                document.getElementById(id).style.display = "none";
            }
            function om(ruta)
            {
                document.getElementById('fotoGrande').src = '../' + ruta.substring(3);
                document.getElementById('botones').innerHTML = '';
                $('#foto').fadeIn('slow');
            }
            function ima(ruta, cantidad)
            {
                var arreglo = ruta.split(';');
                var hiddens = '';
                var ims = '#';
                for (var i = 1; i <= cantidad; i++)
                {
                    hiddens += "<input type='hidden' name='im" + i + "' id='im" + i + "' value='" + arreglo[i - 1] + "'/>";
                    ims += 'im' + i + ';';
                }
                document.getElementById('ocul').innerHTML = hiddens;
                document.getElementById('fotoGrande').src = arreglo[0].substring(6);
                window.location = ims.substring(0, ims.length - 1);
                document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'no\');"/>';
                $('#foto').fadeIn('slow');
            }
            function cambiaIm(num)
            {
                var usr = window.location.hash.substring(1);
                var sep = usr.split(';');
                var cant = sep.length;
                if (num == 'uno')
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[0]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'no\');"/>';
                }
                else if (num == 'dos')
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[2]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'uno\');"/>';
                }
                else if (num == 'tres')
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[3]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'dos\');"/>';
                }
                else if (num == 'cuatro')
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[4]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'tres\');"/>';
                }
                else if (cant == 2)
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[1]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'uno\');"/>';
                }
                else if (cant == 3)
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[1]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'dos\');"/>';
                }
                else if (cant == 4)
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[1]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'tres\');"/>';
                }
                else if (cant == 5)
                {
                    document.getElementById('fotoGrande').src = document.getElementById(sep[1]).value.substring(6);
                    document.getElementById('botones').innerHTML = '<input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm(\'cuatro\');"/>';
                }
            }
            function resultados()
            {
                if (document.getElementById('resul1') != null)
                {
                    $('#resul1').fadeIn('slow');
                    if (document.getElementById('resul2') != null)
                    {
                        setTimeout(function() {
                            $('#resul2').fadeIn('slow');
                        }, 500)
                        if (document.getElementById('resul3') != null)
                        {
                            setTimeout(function() {
                                $('#resul3').fadeIn('slow');
                            }, 1000)
                            if (document.getElementById('resul4') != null)
                            {
                                setTimeout(function() {
                                    $('#resul4').fadeIn('slow');
                                }, 1500)
                                if (document.getElementById('resul5') != null)
                                {
                                    setTimeout(function() {
                                        $('#resul5').fadeIn('slow');
                                    }, 2000)
                                    if (document.getElementById('resul6') != null)
                                    {
                                        setTimeout(function() {
                                            $('#resul6').fadeIn('slow');
                                        }, 2500)
                                        if (document.getElementById('sigue') != null)
                                        {
                                            setTimeout(function() {
                                                $('#sigue').fadeIn('slow');
                                            }, 3000)
                                            if (document.getElementById('antes') != null)
                                            {
                                                setTimeout(function() {
                                                    $('#antes').fadeIn('slow');
                                                }, 3000)
                                            }
                                        }
                                        else
                                        {
                                            if (document.getElementById('antes') != null)
                                            {
                                                setTimeout(function() {
                                                    $('#antes').fadeIn('slow');
                                                }, 3000)
                                            }
                                        }
                                    }
                                    else
                                    {
                                        if (document.getElementById('antes') != null)
                                        {
                                            setTimeout(function() {
                                                $('#antes').fadeIn('slow');
                                            }, 3000)
                                        }
                                    }
                                }
                                else
                                {
                                    if (document.getElementById('antes') != null)
                                    {
                                        setTimeout(function() {
                                            $('#antes').fadeIn('slow');
                                        }, 3000)
                                    }
                                }
                            }
                            else
                            {
                                if (document.getElementById('antes') != null)
                                {
                                    setTimeout(function() {
                                        $('#antes').fadeIn('slow');
                                    }, 3000)
                                }
                            }
                        }
                        else
                        {
                            if (document.getElementById('antes') != null)
                            {
                                setTimeout(function() {
                                    $('#antes').fadeIn('slow');
                                }, 3000)
                            }
                        }
                    }
                    else
                    {
                        if (document.getElementById('antes') != null)
                        {
                            setTimeout(function() {
                                $('#antes').fadeIn('slow');
                            }, 3000)
                        }
                    }
                }
                else
                {
                    if (document.getElementById('antes') != null)
                    {
                        setTimeout(function() {
                            $('#antes').fadeIn('slow');
                        }, 3000)
                    }
                }
            }
            function sPagina(pag)
            {
                Pagina(pag);
            }
        </script>
    </head>
    <body id="bod" onload="menu();
            resultados();">
        <div id="contenedorPrimario" style="position: relative;">
            <div id="foto" style="position: absolute; background: rgba(0, 0, 0, 0.5); width: 450px; height: 535px; left: 575px;top: 153px;z-index: 1;display: none;">
                <center>
                    <div style="float: right; width: 22px">
                        <label class="equis tooltip" style="font-family: nunito, san-serif; font-size: 20px; color: #FFFFFF; cursor: pointer;" onclick="$('#foto').fadeOut('slow');">
                            x<span>Cerrar</span>
                        </label>
                    </div>
                    <table cellspacing="10" cellpadding="20">
                        <tr>
                            <td>
                                <div id="ocul"></div>
                                <img style="border: 3px solid #FFFFFF;" id="fotoGrande" src="" width="360" height="460"/>
                                <div id="botones" style="position: absolute;left: 413px;top: 348px;">
                                    <input class="triangulo_der_por" style="background: transparent;" type="button" id="boton" onclick="cambiaIm('no');">
                                </div>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
            <div id="titulo" style="position: relative;">
                <br/>

                <img src="../recursos/logos/4.jpg" style="padding-left: 19px;padding-top: 2px;">
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
                                            <h4 class="vertical_css3 menuColor">QUIENES&nbsp;SOMOS</h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="tdmenue" style="width: 42px;" onclick="window.location.href = '../equipo.html';">
                                    <div style="position: relative; width: 42px;">
                                        <div style="position: absolute; top: -80px; left: 7px;">
                                            <h4 class="vertical_css3 menuColor">EQUIPO</h4>
                                        </div>
                                    </div>
                                </td>
                                <td id="servicios" class="tdmenus" style="width: 42px;" onclick="window.location.href = '../servicios.html';">
                                    <div style="position: relative; width: 42px;">
                                        <div style="position: absolute; top: -80px; left: 7px;">
                                            <h4 class="vertical_css3 menuColor">SERVICIOS</h4>
                                        </div>
                                    </div>
                                </td>
                                <td id="portafolio" class="tdmenup" style="width: 42px;" onclick="window.location.reload();">
                                    <div style="position: relative; width: 42px;">
                                        <div style="position: absolute; top: -80px; left: 7px;">
                                            <h4 class="vertical_css3 menuColor">PORTAFOLIO</h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="tdmenuc" style="width: 42px;" onclick="window.location.href = '../clientes/';">
                                    <div style="position: relative; width: 42px;">
                                        <div style="position: absolute; top: -80px; left: 7px;">
                                            <h4 class="vertical_css3 menuColor">CLIENTES</h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="tdmenuco" style="width: 42px;" onclick="window.location.href = '../contacto.html';">
                                    <div style="position: relative; width: 42px;">
                                        <div style="position: absolute; top: -80px; left: 7px;">
                                            <h4 class="vertical_css3 menuColor">CONTACTO</h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <div>
                            <table border="0px" style="width: 740px; height: 320px;position: absolute; top: 35px; left: 285px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 65px; vertical-align: bottom;">
                                            <table border="0px" style="width: 65px;position: absolute; top: 50px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="vertical-align: bottom;">
                                                            <a href="?i=gestion">
                                                                <h1 id="gestion" class="vertical_css3 submen">Gestión&nbsp;de&nbsp;prensa</h1>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="?i=publicaciones">
                                                                <h1 id="pub" class="vertical_css3 submen">Publicaciones</h1>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="?i=eventos">
                                                                <h1  id="eventos" class="vertical_css3 submen">Eventos</h1>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <div style="position: absolute; top: -17px;">
                                                <div id="contenido" style="position: absolute; top: 145px;">
                                                    <?php
                                                    if (isset($_GET['i'])) {
                                                        if ($_GET['i'] == "eventos") {
                                                            include "paginador.php";
                                                        } else if ($_GET['i'] == "publicaciones") {
                                                            include "paginadorPub.php";
                                                        } else if ($_GET['i'] == "gestion") {
                                                            include "paginadorGes.php";
                                                        }
                                                    } else {
                                                        include "paginador.php";
                                                    }
                                                    ?>
                                                </div>
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
                        <div style="float: right; margin-right:15px;">
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
if (isset($_GET['i'])) {
    if ($_GET['i'] == "eventos") {
        echo "<script type='text/javascript'>document.getElementById('eventos').className = 'vertical_css3 submenact';</script>";
    } else if ($_GET['i'] == "publicaciones") {
        echo "<script type='text/javascript'>document.getElementById('pub').className = 'vertical_css3 submenact';</script>";
    } else if ($_GET['i'] == "gestion") {
        echo "<script type='text/javascript'>document.getElementById('gestion').className = 'vertical_css3 submenact';</script>";
    }
} else {
    echo "<script type='text/javascript'>document.getElementById('eventos').className = 'vertical_css3 submenact';</script>";
}
?>