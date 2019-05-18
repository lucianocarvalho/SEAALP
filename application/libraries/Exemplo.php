<?php

/**
 * Class Exemplo
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Exemplo extends Base {

	protected $id;
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
			'idConteudo' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'null' => false
			),
			'texto' => array(
				'type' => 'LONGTEXT',
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