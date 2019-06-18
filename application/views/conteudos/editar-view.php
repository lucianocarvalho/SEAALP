<h4><?php echo $conteudo->titulo; ?></h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Título</label>
		<?php $value = isset( $conteudo->titulo ) ? $conteudo->titulo : ''; ?>
		<input type="text" class="form-control" name="titulo" placeholder="Digite o título..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Conteúdo</label>
		<?php $value = isset( $conteudo->texto ) ? $conteudo->texto : ''; ?>

		<?php $breaks = array("<br />","<br>","<br/>");  ?>
		<textarea class="form-control" name="texto" placeholder="Digite o conteúdo..." rows="15"><?php echo str_ireplace( $breaks, "\r\n", $value ); ?></textarea>
	</div>

	<input type="hidden" name="id" value="<?php echo $conteudo->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>