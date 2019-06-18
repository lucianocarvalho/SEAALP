<h4>Cadastrar conteúdo</h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Título</label>
		<?php $value = ( set_value('titulo') ) ? set_value('titulo') : ''; ?>
		<input type="text" class="form-control" name="titulo" placeholder="Digite o título..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Conteúdo</label>
		<?php $value = ( set_value('texto') ) ? set_value('texto') : ''; ?>
		<textarea class="form-control" name="texto" placeholder="Digite o conteúdo..." rows="15"><?php echo $value; ?></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>