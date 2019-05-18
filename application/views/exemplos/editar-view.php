<h4 class="mb-3"><?php echo $exemplo->texto; ?></h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Texto</label>
		<textarea class="form-control" name="texto" placeholder="Digite o conteúdo..." rows="10"><?php echo $exemplo->texto; ?></textarea>
	</div>

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="hidden" name="idConteudo" value="<?php echo $exemplo->idConteudo; ?>">

	<button type="submit" class="btn btn-primary">Salvar</button>
</form>