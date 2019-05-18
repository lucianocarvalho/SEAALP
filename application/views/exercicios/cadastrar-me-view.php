<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<h4><?php echo $exercicio->enunciado; ?></h4>

<hr>

<form method="POST">	
	<button type="button" id="inserir" class="btn btn-sm btn-dark"><i class="fas fa-plus"></i> Inserir alternativa</button>
	<div id="lista_opcoes" class="mt-3"></div>

	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>

<script type="text/javascript">
	$(document).ready( function() {
		$(document).on('click', '#inserir', function( e ) {

			var count = $('.alternativa').length;
			var html = '';

			html += '<div class="form-row mb-1 alternativa">';
			html += '	<div class="form-group col-md-7">';			
			html += '	<input name="alternativas[' + count + ']" class="form-control" placeholder="Digite o texto...">';
			html += '	</div>';

			html += '	<div class="form-group col-md-3">';	
			html += '	<label><input name="corretas[' + count + ']" type="checkbox"> Alternativa correta</label>';
			html += '	</div>';
			
			html += '	<div class="form-group col-md-2">';	
			html += '	<button type="button" class="btn btn-sm btn-danger w-100 remover"><i class="fas fa-times"></i> Remover</button>';
			html += '	</div>'
			html += '</div>';

			$('#lista_opcoes').append( html );
		});

		$(document).on('click', '.remover', function( e ) {
			$(this).closest('.alternativa').remove();
		});
	});
</script>