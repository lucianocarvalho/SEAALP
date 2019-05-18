<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<h4><?php echo $exercicio->enunciado; ?></h4>

<form method="POST">
	<textarea class="form-control mb-2" name="texto" placeholder="Digite aqui a frase correta..." rows="4"></textarea>
	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>