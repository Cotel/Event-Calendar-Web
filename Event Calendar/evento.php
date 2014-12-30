<?php 
/**
* 
*/
class Evento{

	private $titulo;
	private $fecha;
	private $cliente;
	private $servicio;
	
	public function __construct($tit, $fec, $cli, $serv){
		$this->titulo = $tit;
		$this->fecha = $fec;
		$this->cliente = $cli;
		$this->servicio = $serv;
	}

	public function show(){
		// var $dia = isset($_GET['day']);
		$content = '<tr>'.
						'<td>'.$this->titulo.'</td>'.
						'<td>'.$this->fecha.'</td>'.
						'<td>'.$this->cliente.'</td>'.
						'<td>'.$this->servicio.'</td>'.
					'</tr>';
		return $content;
	}
}


 ?>