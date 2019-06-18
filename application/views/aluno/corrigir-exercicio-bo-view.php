<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<h5 class="mt-3">Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<hr>

<h5 class="mt-3">Frase original:</h5>
<p><?php echo str_replace(';', '', $frase->texto ); ?></p>

<h5 class="mt-3 font-weight-bold">Sua resposta:</h5>

<?php
	$certo = TRUE;

	$palavras = explode(';', $frase->texto );
	$respostas = $this->input->post('palavras');

	foreach( $palavras as $key=>$palavra ) {
		if( trim( $palavra ) != trim( $respostas[ $key ] ) ) {
			$certo = FALSE;
		}
	}
?>

<?php if( $certo ): ?>
	Sua ordenação está <span class="badge badge-success">Correta</span>
<?php else: ?>
	Sua ordenação está <span class="badge badge-danger">Errada</span> :(
<?php endif; ?>

<p><b>Você ordenou:</b> <?php echo implode(' ', $this->input->post('palavras') ); ?></p>

<?php if( ! is_null( $proximo_exercicio ) ): ?>
	<a href="<?php echo base_url('painel/exercicios/realizar/' . $proximo_exercicio->id ); ?>" class="btn btn-success"> Próximo exercício <i class="fas fa-arrow-right"></i></a>
<?php endif; ?>

<a href="<?php echo base_url('painel/exercicios'); ?>" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Voltar aos exercícios</a>