<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<h5 class="mt-3">Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<hr>

<h5 class="mt-3 font-weight-bold">Sua resposta:</h5>

<p>
	Você marcou a alternativa
	<b>
	<?php if( $this->input->post('alternativa') == 1 ): ?>
		Certo
	<?php else: ?>
		Errado
	<?php endif; ?>
	</b>
	e a sua resposta está
	<?php $resultado = ( $resposta->correta == $this->input->post('alternativa') ) ? TRUE : FALSE; ?>
	<?php if( $resultado ): ?>
		<span class="badge badge-success">Correta</span>
	<?php else: ?>
		<span class="badge badge-danger">Errada</span>
	<?php endif; ?>	
	.
</p>

<?php if( ! is_null( $proximo_exercicio ) ): ?>
	<a href="<?php echo base_url('painel/exercicios/realizar/' . $proximo_exercicio->id ); ?>" class="btn btn-success"> Próximo exercício <i class="fas fa-arrow-right"></i></a>
<?php endif; ?>

<a href="<?php echo base_url('painel/exercicios'); ?>" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Voltar aos exercícios</a>