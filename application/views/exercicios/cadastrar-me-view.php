<?php echo validation_errors(); ?>

<?php echo $exercicio->enunciado; ?>

<form method="POST">
	<hr>
	<div id="lista_opcoes"></div>
	<button type="button" id="inserir" class="btn btn-sm btn-dark">Inserir alternativa</button>
	<hr>

	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>

<script type="text/javascript">
	$(document).ready( function() {
		$(document).on('click', '#inserir', function( e ) {

			var count = $('.alternativa').length;
			var html = '';

			html += '<div class="form-group alternativa">';
			html += '	<input name="alternativas[' + count + ']" class="form-control" placeholder="Digite o texto...">';
			html += '	<label><input name="corretas[' + count + ']" type="checkbox"> Alternativa correta</label>';
			html += '	<button type="button" class="btn btn-sm btn-danger remover">Remover</button>';
			html += '</div>';

			$('#lista_opcoes').append( html );
		});

		$(document).on('click', '.remover', function( e ) {
			$(this).closest('.alternativa').remove();
		});
	});
</script>