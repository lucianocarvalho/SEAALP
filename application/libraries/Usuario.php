<?php

/**
 * Class Usuario
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Usuario extends Base {

	protected $id;
	protected $nome;
	protected $sexo;
	protected $perfil;
	protected $matricula;
	protected $senha;

	public function schema() {
		return array(
			'id' => array(
				'type' => 'BIGINT',
				'unsigned' => true,
				'unique' => true,
				'auto_increment' => true
			),
			'nome' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			),
			'sexo' => array(
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => true,
			),
			'matricula' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true
			),
			'senha' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			),
			'perfil' => array(
				'type' => 'CHAR',
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

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getPerfil(){
		return $this->perfil;
	}

	public function setPerfil($perfil){
		$this->perfil = $perfil;
	}

	public function getMatricula(){
		return $this->matricula;
	}

	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
}