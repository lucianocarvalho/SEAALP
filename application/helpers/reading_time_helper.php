<?php

if ( ! function_exists('reading_time') ) {
	function reading_time( $content ) {
		$tempo = '';

		$word_count = str_word_count( $content );
		$min = floor( ( $word_count / 200 ) * 60 );
	
		$tempo .= $min . ' segundo(s)';

		return $tempo;
	}
}
