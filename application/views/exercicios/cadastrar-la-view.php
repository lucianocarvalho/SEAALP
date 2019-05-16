<?php echo validation_errors(); ?>

<?php echo $exercicio->enunciado; ?>

<form method="POST">
	<div class="form-group">
		<label>Texto corrido:</label>
		<textarea class="form-control" name="texto" placeholder="Digite o texto corrido..."></textarea>
		<small class="muted">Preencha com %lacuna% dentro do texto corrido em que deseja inserir uma lacuna.</small>
	</div>
	<div class="form-group">
		<label>Lacunas:</label>
		<textarea class="form-control" name="respostas" placeholder="Digite as lacunas separadas por vírgula..."></textarea>
	</div>
	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>