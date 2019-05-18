<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<h4><?php echo $exercicio->enunciado; ?></h4>

<form method="POST">
	<p>Marque a alternativa que deve ser correta:</p>
	<div class="form-check">
		<input class="form-check-input" type="radio" name="correta" id="certo" value="1" checked>
		<label class="form-check-label" for="certo">Certo</label>
	</div>
	<div class="form-check">
		<input class="form-check-input" type="radio" name="correta" id="errado" value="0">
		<label class="form-check-label" for="errado">Errado</label>
	</div>
	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>