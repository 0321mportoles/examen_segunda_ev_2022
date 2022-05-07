<?php

	function carga($clase){
	    require "./class/$clase.php";
	}

	function autoload()
	{
		spl_autoload_register("carga");
	}

	autoload();

	function iniciarSesion($destroyIfInit = false) {
		session_start();
		if ($destroyIfInit) {
			session_destroy();
			session_start();
		}
	}

	function extraeNombreImagenDesdeArchivo($name) : string
	{
		return substr($name, 0, strpos($name, '.'));
	}