<?php echo validation_errors(); ?>

<form method="POST">
	<div class="form-group">
		<label>Texto</label>
		<textarea class="form-control" name="texto" placeholder="Digite o conteúdo..."></textarea>
	</div>

	<input type="hidden" name="idConteudo" value="<?php echo $id; ?>">

	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>