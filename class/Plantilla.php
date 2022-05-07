<?php

class Plantilla
{
	public static function plantillaPregunta($idioma, $img): string
	{
		$nombreImagen = extraeNombreImagenDesdeArchivo($img);

		$html = '';
		$html .= "<img src='./idiomas/$idioma/$img' alt='' /><br>";

		for ($i=0; $i < strlen($nombreImagen); $i++) { 
			$html .= "<input class='respuesta' type='text' name='respuesta[]' maxlength='1' style='' />";
		}

		$html .= "<input type='hidden' name='respuestaCorrecta' value='$nombreImagen'></input>";

		return $html;
	}

	public static function informeRespuestas(): string
	{
		$html = '';

		return $html;
	}	
}
