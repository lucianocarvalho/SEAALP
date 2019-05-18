<h4 class="mb-3"><?php echo $conteudo->titulo; ?></h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Texto</label>
		<textarea class="form-control" name="texto" placeholder="Digite o conteúdo..." rows="10"></textarea>
	</div>

	<input type="hidden" name="idConteudo" value="<?php echo $id; ?>">

	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>