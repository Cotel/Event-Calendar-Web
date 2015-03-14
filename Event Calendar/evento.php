<?php 
/**
* 
*/
class Evento{

	private $titulo;
	private $fecha;
	private $cliente;
	private $servicio;
	private $hora;
	private $ID;

	public function __construct($id, $tit, $fec, $hor, $cli, $serv){
		$this->ID = $id;
		$this->titulo = $tit;
		$this->fecha = $fec;
		$this->hora = $hor;
		$this->cliente = $cli;
		$this->servicio = $serv;
	}

	public function show(){
		// var $dia = isset($_GET['day']);
		$content = '<tr id="evento" class="active">'.
						'<td>'.$this->titulo.'</td>'.
						'<td>'.$this->fecha.'</td>'.
						'<td>'.$this->hora.'</td>'.
						'<td>'.$this->cliente.'</td>'.
						'<td>'.$this->servicio.'</td>'.
						'<td>'.'<form action="borrado.php" method="post">'.'<input type="hidden" name="ID" value="'.$this->ID.'">'.'<input type="submit" class="btn btn-danger btn-xs" value="Borrar">'.'</form>'.
					'</tr>';
		return $content;
	}

}


 ?>