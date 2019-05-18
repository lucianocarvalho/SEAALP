<h4>Cadastrar anotação</h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<p><b>Conteúdo:</b> <?php echo $conteudo->titulo; ?></p>
	<div class="form-group">
		<label>Texto</label>
		<textarea class="form-control" name="texto" placeholder="Digite a anotação..."></textarea>
	</div>
	<input type="hidden" name="idConteudo" value="<?php echo $conteudo->id; ?>">
	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>