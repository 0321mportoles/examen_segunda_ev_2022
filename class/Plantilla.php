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

	public static function plantillaInformeResumido($respuestas): string
	{
		$letrasAcertadas = $letrasTotales = $aciertos = $palabrasTotales = 0;

		foreach ($respuestas as $i => $r) {
			$evaluacion = unserialize($r);
			$letrasTotales += strlen($evaluacion->getPregunta());
			$letrasAcertadas += $evaluacion->getLetrasAcertadas();
			$palabrasTotales++;
			$aciertos += $evaluacion->getTxtResultado() == 'Acierto' ? 1: 0;
		}

		$html = '';
		$html .= '<h2>Informe de resultados</h2>';
		$html .= "<p><strong>Letras en total</strong>: " . $letrasTotales . "</p>";
		$html .= "<p><strong>Letras acertadas</strong>: " . $letrasAcertadas . "</p>";
		$html .= "<p><strong>Porcentaje de letras acertadas</strong>: " . round($letrasAcertadas/$letrasTotales, 4) * 100 . "%</p>";
		$html .= "<p><strong>Palabras en total</strong>: " . $palabrasTotales . "</p>";
		$html .= "<p><strong>Palabras acertadas</strong>: " . $aciertos . "</p>";
		$html .= "<p><strong>Porcentaje de aciertos</strong>: " . round($aciertos/$palabrasTotales, 4) * 100 . "%</p>";

		return $html;
	}

	public static function plantillaResumenRespuestas($idioma, $respuestas, $imagenes): string
	{
		$html = '';

		$html .= '<h2>Resumen respuestas</h2>';
		foreach ($respuestas as $i => $r) {
			$evaluacion = unserialize($r);
			$html .= "<img src='./idiomas/$idioma/{$imagenes[$i]}' alt='' /><br>";
			$html .= $evaluacion;
			$html .= "<hr/>";
		}

		return $html;
	}	
}
