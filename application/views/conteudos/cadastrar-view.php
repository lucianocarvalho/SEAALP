<h4>Cadastrar conteúdo</h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Título</label>
		<input type="text" class="form-control" name="titulo" placeholder="Digite o título...">
	</div>
	<div class="form-group">
		<label>Conteúdo</label>
		<textarea class="form-control" name="texto" placeholder="Digite o conteúdo..." rows="15"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>