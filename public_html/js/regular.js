//busca caracteres que no sean espacio en blanco en una cadena  
function vacio(q)
{  
	for ( i = 0; i < q.length; i++ )
	{  
		if ( q.charAt(i) != " " )
		{  
			return true  
		}  
	}  
	return false  
}  
  
//valida que el campo no este vacio y no tenga solo espacios en blanco  
function valida(F)
{  
	if( vacio(F) == false )
	{  
		popUpSetUbicacion('debe completar todos los campos','20%','45%');
		event.returnValue = false; //para IE
		return false;
	}
	else
	{   
   		return true;
	}
}

function checkMail(txMail)
{
	var filter  = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	if ( ! filter.test(txMail) )
	{
		 popUpSetUbicacion('Dirección de e-mail incorrecta','20%','45%');
		 event.returnValue = false; //para IE
		 return false;
	}
	else
	{
		return true;
	}
}

function validaHora(txto)
{
	var filter  =  /^(0[1-9]|1\d|2[0-3]):([0-5]\d)$/;
	if ( ! filter.test(txto) )
	{
		 popUpSetUbicacion('Hora Incorrecta','20%','45%');
		 event.returnValue = false; //para IE
		 return false;
	}
	else
	{
		return true;
	}
}

function validaSoloLetras(e)
{
	//incluida la Ñ y la ñ
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-zñÑ\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validaUnicamenteLetras(e)
{
	//incluida la Ñ y la ñ
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-zñÑ]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
} 

function validaLetrasYNumeros(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
	patron = /[A-Za-zñÑ\s\d]/;
	te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validaSoloNumeros(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
	patron = /\d/;
	te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validaCaracteresHora(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
	patron = /[\d\:]/;
	te = String.fromCharCode(tecla);
    return patron.test(te);
}