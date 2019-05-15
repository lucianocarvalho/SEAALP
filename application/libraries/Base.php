<?php

/**
 * Classe principal em que outras library a estende para facilitar seu uso.
 * 
 * @category Library
 * @author Luciano Carvalho <lucianojunior@cednet.com.br>
 */
class Base {

	/**
	 * Método para preencher os atributos da classe que estenda.
	 * 
	 * @param array $params
	 * @return self
	 */
	public function fill( $params ) {
		foreach( $params as $key=>$param ) {
			$method = 'set' . ucfirst( $key );

			if( is_callable( array( $this, $method ) ) )
				call_user_func( array( $this, $method ), $param );
		}

		return $this;
	}

	/**
	 * Método para setar uma chave específica do objeto.
	 * 
	 * @param string $key
	 * @param string $value
	 * @return self
	 */
	public function set( $key, $value ) {
		$method = 'set' . ucfirst( $key );

		if( is_callable( array( $this, $method ) ) )
				call_user_func( array( $this, $method ), $value );

		return $this;
	}
	
	/**
	 * Método para transformar o objeto em um array.
	 * 
	 * @return array
	 */
	public function to_array() {
		$array = array();
		$attributes = get_class_vars( get_class( $this ) );

		foreach( $attributes as $key=>$attribute ) {
			$method = 'get' . ucfirst( $key );

			if( is_callable( array( $this, $method ) ) )
				$array[ $key ] = call_user_func( array( $this, $method ) );
		}

		return $array;
	}
}