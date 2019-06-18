<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<h5 class="mt-3">Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<hr>

<h5 class="mt-3 font-weight-bold">Sua resposta:</h5>

<?php
	foreach( $alternativas as $alternativa ) {
		if( $alternativa['id'] == $this->input->post('alternativa') ) {
			$selecionado = $alternativa['texto'];
			$resultado = $alternativa['correta'];
		}
	}
?>

<p>
	Você marcou a alternativa <b><?php echo $selecionado; ?></b> e a sua resposta está
	<?php if( $resultado == 1 ): ?>
		<span class="badge badge-success">Correta</span>
	<?php else: ?>
		<span class="badge badge-danger">Errada</span>
	<?php endif; ?>	
	.
</p>

<hr>

<h5 class="mt-3">Respostas:</h5>
<table class="table">
	<?php foreach( $alternativas as $alternativa ): ?>
		<?php $class = ( $alternativa['correta'] == 1 ) ? 'table-success' : 'table-danger'; ?>
		<tr class="<?php echo $class; ?>">
			<td>
				<?php echo $alternativa['texto']; ?>
				<?php if( $this->input->post('alternativa') == $alternativa['id'] ): ?>
					<span class="badge badge-secondary">Resposta selecionada</span>
				<?php endif; ?>
			</td>
		</tr>		
	<?php endforeach; ?>
</table>

<?php if( ! is_null( $proximo_exercicio ) ): ?>
	<a href="<?php echo base_url('painel/exercicios/realizar/' . $proximo_exercicio->id ); ?>" class="btn btn-success"> Próximo exercício <i class="fas fa-arrow-right"></i></a>
<?php endif; ?>

<a href="<?php echo base_url('painel/exercicios'); ?>" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Voltar aos exercícios</a>
