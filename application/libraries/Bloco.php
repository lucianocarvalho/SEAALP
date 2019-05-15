<?php

/**
 * Class Bloco
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Bloco extends Base {

	protected $id;
	protected $idExercicio;
	protected $texto;
	protected $ordem;

	public function schema() {
		return array(
			'id' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'unique' => true,
				'auto_increment' => true
			),
			'idExercicio' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'null' => false
			),
			'texto' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			),
			'ordem' => array(
				'type' => 'INT',
				'null' => false
			)
		);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdExercicio(){
		return $this->idExercicio;
	}

	public function setIdExercicio($idExercicio){
		$this->idExercicio = $idExercicio;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}

	public function getOrdem(){
		return $this->ordem;
	}

	public function setOrdem($ordem){
		$this->ordem = $ordem;
	}
}