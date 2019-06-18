<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<table class="table">
	<tbody>
		<tr>
			<td class="font-weight-bold">Conteúdo:</td>
			<td>
				<?php echo $conteudo->titulo; ?>
				<a href="<?php echo base_url('painel/conteudos/visualizar/' . $conteudo->id ); ?>" class="btn btn-sm btn-primary ml-3">Acessar conteúdo <i class="fas fa-angle-right ml-1"></i></a>
			</td>
		</tr>
		<tr>
			<td class="font-weight-bold">Tipo:</td>
			<td>
				<?php if( $exercicio->tipo == "ME" ): ?>
					<span class="badge badge-pill badge-primary">Múltipla escolha</span>
				<?php elseif( $exercicio->tipo == "CE" ): ?>
					<span class="badge badge-pill badge-danger">Certo ou errado</span>
				<?php elseif( $exercicio->tipo == "LA" ): ?>
					<span class="badge badge-pill badge-warning">Lacunas</span>
				<?php elseif( $exercicio->tipo == "BO" ): ?>
					<span class="badge badge-pill badge-dark">Blocos</span>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="font-weight-bold">Suas anotações:</td>
			<td>
				<?php if( count( $anotacoes ) > 0 ): ?>
					<?php foreach( $anotacoes as $anotacao ): ?>
						<p class="mb-0"><?php echo $anotacao['texto']; ?></p>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="mb-0 text-muted">Sem anotações</p>
				<?php endif; ?>
			</td>
		</tr>
	</tbody>
</table>

<hr>

<h5>Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<h5 class="mt-3">Blocos de textos:</h5>

<form method="POST" action="<?php echo base_url('painel/exercicios/corrigir'); ?>">
	<?php $palavras = explode(';', $frase->texto ); ?>
	<?php shuffle( $palavras ); ?>

	<ul id="sortable">
		<?php foreach( $palavras as $key=>$palavra ): ?>
			<li id="<?php echo $key; ?>" class="ui-state-default"><?php echo $palavra; ?></li>
		<?php endforeach; ?>
	</ul>

	<?php foreach( $palavras as $palavra ): ?>
		<input type="hidden" name="palavras[]" value="<?php echo $palavra; ?>">
	<?php endforeach; ?>
	
	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button class="btn btn-success mt-3"><i class="fas fa-check"></i> Responder</button>
</form>

<script src="<?php echo base_url('assets/jquery-3.4.1/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
$(function() {
	var listValues = [];

	$("#sortable").sortable({
		stop: function( event, ui ) {

			$('[name="palavras[]"]').remove();

			var children = $('#sortable').sortable('refreshPositions').children();

			$.each(children, function() {
				$('<input>').attr({
					type: 'hidden',
					name: 'palavras[]',
					value: $(this).text().trim()
				}).appendTo('form');
			});		
		}
	});

	$("#sortable").disableSelection();
});
</script>