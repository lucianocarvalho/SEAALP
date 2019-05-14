<?php

/**
 * Class Exercicio
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Exercicio extends Base {

	protected $id;
	protected $idConteudo;
	protected $enunciado;
	protected $tipo;

	public function schema() {
		return array(
			'id' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'unique' => true,
				'auto_increment' => true
			),
			'idConteudo' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'null' => false
			),
			'enunciado' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			),
			'tipo' => array(
				'type' => 'CHAR',
				'constraint' => 2,
				'null' => true
			)
		);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdConteudo(){
		return $this->idConteudo;
	}

	public function setIdConteudo($idConteudo){
		$this->idConteudo = $idConteudo;
	}

	public function getEnunciado(){
		return $this->enunciado;
	}

	public function setEnunciado($enunciado){
		$this->enunciado = $enunciado;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
}