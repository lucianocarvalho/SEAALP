<?php

if ( ! function_exists('get_exercise_type') ) {
	function get_exercise_type( $type ) {

		switch( $type ) {
			case "ME":
				return "Múltipla escolha";
			case "CE":
				return "Certo ou errado";
			case "LA":
				return "Lacunas";
			case "BO":
				return "Blocos";
		}
		
		return NULL;
	}
}
