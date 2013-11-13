<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../../../css/global.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../../js/jquery-latest.js"></script>
    <style>
        h6
        {
            cursor:pointer;
        }
        .anone
        {
            text-decoration:none;
            color:gray;
        }
        #index ul
        {
            list-style:none;
        }
        #index ul li
        {
            cursor:pointer;
        }
        #index ul li a
        {
            text-decoration:none;
            color:gray;
        }
        .info
        {
            background-color: white;
            margin: 10px;
            padding: 20px;
            color: gray;
            text-align:justify;
            font-size:12px;
            border: 1px solid #c2c2c2;
            background-image: -webkit-linear-gradient(white, #F6F1F1);
            background-image: -moz-linear-gradient(white, #F6F1F1);
            background-image: -o-linear-gradient(white, #F6F1F1);
            background-image: -ms-linear-gradient(white, #F6F1F1);
            background-image: linear-gradient(white, #F6F1F1);
            border-radius: 			2px;
            -webkit-border-radius: 	2px;
            -moz-border-radius: 	2px;
            border-radius: 			2px;
        }
    </style>
    <script>
        jQuery.fn.scrollTo = function(time)
        {
            var t = $(this).offset().top;
            if(t > 10){t = t - 10}
            if(time == 'fast'){time = 400}
            if(time == 'medium'){time = 800}
            if(time == 'slow'){time = 1200}
            if(time == null){time = 1000}
            $('html,body').animate({scrollTop: t}, time);
        }

        function goto()
        {
            if(window.location.hash != '')
            {
                switch(window.location.hash.substring(1))
                {
                    case 'index':
                        $('#index').scrollTo('slow');
                        break;
                    case 'introduccion':
                        $('#introduccion').scrollTo('slow');
                        break;
                    case 'usuarios':
                        $('#usuarios').scrollTo('slow');
                        break;
                    case 'categorias':
                        $('#categorias').scrollTo('slow');
                        break;
                    case 'videos':
                        $('#videos').scrollTo('slow');
                        break;
                    case 'orden':
                        $('#orden').scrollTo('slow');
                        break;
                    case 'sobre':
                        $('#sobre').scrollTo('slow');
                        break;
                }
            }
        }
    </script>
</head>
<body onLoad="goto();">
<div class="card" id='index' style='	border-radius: 0px;
                                            -webkit-border-radius: 0px;
                                            -moz-border-radius: 0px;
                                            border-radius: 0px;'>
    <h1>Índice</h1>
    <ul>
        <li>
            <a href="#introduccion">Introducción</a>
        </li>
        <li>
            <a href="#usuarios">Usuarios</a>
        </li>
        <li>
            <a href="#categorias">Eventos</a>
        </li>
        <li>
            <a href="#videos">Publicaciones</a>
        </li>
        <li>
            <a href="#orden">Clientes</a>
        </li>
        <li>
            <a href="#sobre">Sobre</a>
        </li>
    </ul>
</div>
<div id='introduccion' class='info'>
    <h1>Introducción</h1><a class='anone' href="#index"><h6>inicio</h6></a>
    <br />
    El sistema de gestión es capaz de gestionar los objetos relacionados en el proceso de mantención del sitio web de Cimagen.<br /><br />
    El sistema es compatible con la versión de trebuchet 2.0, y no es compatible con la creación de bosques de categorías o menús. La plataforma esta orientada a navegadores en base webkit como Google Chrome, Firefox, Opera, Safari e Internet Explorer 10 o superior dejando excluido el DOM establecido por IE9 o inferior.<br /><br />
    La aplicación incluye la personalización del menú contextual, esto quiere decir que se adquiere funciones adicionales al presionar con el botón derecho del ratón.<br /><br />
    Un buen ejemplo de este uso, seria para eliminar un objeto; que obligatoriamente se debe presionar con el botón derecho del ratón sobre el objeto a eliminar (usuario, evento, cliente, etc.) para acceder a la opción del borrado.<br /><br />
    <center><img src="../../../recursos/ayuda/uno.jpg"/></center><br /><br />
    En el sistema, todos los objetos tienen el estado de activo o inactivo, al momento de cambiar estos estados, los objetos se vuelven invisibles o inutilizables, pero al momento de eliminar un objeto, se elimina desde la base de datos y no puede ser recuperado, a diferencia de cambiar los estados entre objetos.<br /><br />
</div>
<br /><br />
<div id='usuarios' class='info'>
    <h1>Usuarios</h1><a class='anone' href="#index"><h6>inicio</h6></a>
    <br />
    El mantenedor de creación de usuarios permite Crear, Eliminar, Editar, Activar o desactivar usuarios.<br /><br />
    El sistema no cuenta con permisos de usuarios, por lo que solo existe un nivel de usuario, el usuario que tiene acceso a todas las gestiones del sistema.<br /><br />
    El sistema no valida las sesiones en la base de datos, por lo que un usuario puede mantener una sesión iniciada varios clientes http a la vez.<br /><br />
    Al crear algún usuario mediante el mantenedor de usuarios, se requieren todos los campos, la contraseña al ingresar a la base de datos se ingresa encriptada en formato MD5 para una mayor seguridad.<br /><br />
    El usuario puede eliminar a todos los otros usuarios, exceptuando su propio usuario.<br /><br />
    Cuando un usuario esta con estado inactivo, este no puede iniciar sesión; únicamente pueden iniciar sesión los usuarios que estén con estado activo.<br />
</div>
<br /><br />
<div id='categorias' class='info'>
    <h1>Eventos</h1><a class='anone' href="#index"><h6>inicio</h6></a>
    <br />
    El mantenedor de Eventos es capaz de crear, editar, eliminar y visualizar los eventos.<br /><br />
    Los eventos, se muestran en la pestaña portafolio del sitio principal.<br /><br />
    Un evento puede contener una Fotografia que es la que se mostrara como privia y al hacerle click esta se expandera.<br /><br />
    Si cambia el estado de un evento al modo inactivo este no podra ser visualizado en el sitio principal, pero seguira existiendo para su posteior uso.<br /><br />
</div>
<br /><br />
<div id='videos' class='info'>
    <h1>Publicaciones</h1><a class='anone' href="#index"><h6>inicio</h6></a>
    <br />
    Las publicaciones a diferencia de los eventos anteriormente descritos llevan asociado un archivo en formato PDF.<br/><br/>
    Usted no debera y no podra subir otro formato de archivo de lectura que no sea PDF como por ejemplo doc, docx, txt, etc.<br/><br/>
    Todos los campos son obligatorios, es decir, usted no podra subir una imagen para la vista previa sin tambien subir el archivo PDF o viceversa.<br /><br />
    <center><img src="../../../recursos/ayuda/dos.jpg"/></center><br /><br />
</div>
<br /><br />
<div id='orden' class='info'>
    <h1>Clientes</h1><a class='anone' href="#index"><h6>inicio</h6></a>
    <br />
    En esta sección usted podra crear, editar y eliminar clientes ya sean actuales o antiguos<br/><br/>
    <center><img src="../../../recursos/ayuda/tres.jpg"/></center><br /><br />
    Como  se muestra en la figura anterior, usted podra elegir un nombre para el cliente, una fotografia, su estado (actio o inactivo) y su tiempo. Este ultimo es muy importante ya que definira en que parte de la pagina principal se mostrara el cliente.<br/>
    Si seleciona actual se mostrar en la pestaña clientes, subpestaña "Actuales". si usted seleciona "Antiguo" se mostrara en la subpestaña "Tambien confiaron en nosotras".
</div>
<br /><br />
<div id='sobre' class='info'>
    <h1>Sobre el sistema</h1><a class='anone' href="#index"><h6>inicio</h6></a>
    <br />
    El sistema de gestion de contenido para el sitio web "Cimagen" a sido desarrollado por Matías Michael Caro Serrano para Pisodigital<br /><br />
    Para el correcto funcionamiento, y total compatibilidad del sistema se requiere un servidor que cuente con PHP 5, y su funcionalidad se explotara en un 100% en un navegador que tegna activado JavaScript con Webkit(Google Chrome), Firefox, u Opera.<br /><br />
    El sistema, en el lado del cliente cuenta con las librerías: jQuery, Knockout.js, y Json. Estas librerías son utilizadas para darle dinamismo e interactividad al sistema.<br /><br />
    <center>2013 - Todos los derechos reservados.<br/><a href='mailto:caromatiasm@gmail.com' style='color:gray;text-decoration:none;font-weight:bold;'>caromatiasm@gmail.com</a>.</center>
    <center><a target="_blank" href='http://www.pisodigital.cl' style='color:gray;text-decoration:none;font-weight:bold;'>Pisodigital - Creacion interactiva</a>.</center><br /><br /><br>
    <label>*Se han omitido algunos acentos y signos de puntuacion para evitar problemas de compatibilidad.</label>
</div>
<br /><br />
</body>
</html>
