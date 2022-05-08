<?php

	function carga($clase){
	    require "./class/$clase.php";
	}

	function autoload()
	{
		spl_autoload_register("carga");
	}

	autoload();

	function iniciarSesion($destroy = false) {
		session_start();
		if ($destroy) {
			session_destroy();
			session_start();
		}
	}

	function extraeNombreImagenDesdeArchivo($name) : string
	{
		return substr($name, 0, strpos($name, '.'));
	}