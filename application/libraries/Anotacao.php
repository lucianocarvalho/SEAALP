<?php

/**
 * Class Anotacao
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Anotacao extends Base {

	protected $id;
	protected $idUsuario;
	protected $idConteudo;
	protected $texto;

	public function schema() {
		return array(
			'id' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'unique' => true,
				'auto_increment' => true
			),
			'idUsuario' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'null' => false
			),
			'idConteudo' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'null' => false
			),
			'texto' => array(
				'type' => 'LONGTEXT',
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

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdConteudo(){
		return $this->idConteudo;
	}

	public function setIdConteudo($idConteudo){
		$this->idConteudo = $idConteudo;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}
}