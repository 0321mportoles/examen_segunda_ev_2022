<?php

class Evaluacion
{
	private $pregunta;
	private $respuesta;
	private $letrasAcertadas = 0;
	private $txtResultado = "Fallo";

	public function __construct ($pregunta, $respuesta)
	{
		$this->pregunta = strtolower($pregunta);
		$this->respuesta = strtolower($respuesta);
	}

	public function evaluar()
	{
		for ($i=0; $i < strlen($this->pregunta); $i++) { 
			if (!empty($this->respuesta[$i]) && $this->respuesta[$i] == $this->pregunta[$i]) {
				$this->letrasAcertadas++;
			}
		}

		if ($this->letrasAcertadas == strlen($this->pregunta)) {
			$this->txtResultado = 'Acierto';
		}
	}

	public function __toString () : string
	{
		$html = "<h4>Pregunta: <span style='color:green'>$this->pregunta</span></h4>";
		$html .= "<h4>Respuesta: <span style='color:green'>$this->respuesta</span></h4>";
		$html .= "<h4>Letras acertadas: <span style='color:green'>{$this->letrasAcertadas}</span></h4>";
		$html .= "<h3><span style='color:blue'>$this->txtResultado</span></h3>";
		return $html;
	}

	public function getPregunta() : string
	{
		return $this->pregunta;
	}

	public function getTxtResultado() : string
	{
		return $this->txtResultado;
	}

	public function getLetrasAcertadas() : string
	{
		return $this->letrasAcertadas;
	}
}