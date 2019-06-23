<h4>Editar anotação</h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Texto</label>
		<?php $value = set_value('texto') ? set_value('texto') : $anotacao->texto; ?>
		<textarea class="form-control" name="texto" placeholder="Digite a anotação..."><?php echo $value; ?></textarea>
		<input type="hidden" name="id" value="<?php echo $anotacao->id; ?>">
	</div>
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>