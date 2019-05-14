<?php

/**
 * Class Conteudo
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Conteudo extends Base {

	protected $id;
	protected $titulo;
	protected $texto;

	public function schema() {
		return array(
			'id' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'unique' => true,
				'auto_increment' => true
			),
			'titulo' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			),
			'texto' => array(
				'type' => 'TEXT',
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

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}
}