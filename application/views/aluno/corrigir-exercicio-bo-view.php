<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<h5 class="mt-3">Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<hr>

<h5 class="mt-3">Frase original:</h5>
<p><?php echo $frase->texto; ?></p>

<h5 class="mt-3 font-weight-bold">Sua resposta:</h5>

<?php
	$certo = TRUE;

	$palavras = explode(' ', $frase->texto );
	$respostas = $this->input->post('palavras');

	foreach( $palavras as $key=>$palavra ) {
		if( $palavra != $respostas[ $key ] ) {
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

<a href="<?php echo base_url('painel/exercicios'); ?>" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Voltar aos exercícios</a>