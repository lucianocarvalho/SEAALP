<?php

/**
 * Class Certo_errado
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Certo_errado extends Base {

	protected $id;
	protected $idExercicio;
	protected $correta;

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
			'correta' => array(
				'type' => 'INT',
				'constraint' => 1,
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

	public function getCorreta(){
		return $this->correta;
	}

	public function setCorreta($correta){
		$this->correta = $correta;
	}
}