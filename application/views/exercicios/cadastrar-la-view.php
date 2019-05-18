<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<h4><?php echo $exercicio->enunciado; ?></h4>

<form method="POST">
	<div class="form-group">
		<label>Texto corrido:</label>
		<textarea class="form-control" name="texto" placeholder="Digite o texto corrido..."></textarea>
		<small class="muted">Preencha com %lacuna% dentro do texto corrido em que deseja inserir uma lacuna.</small>
	</div>
	<div class="form-group">
		<label>Lacunas:</label>
		<textarea class="form-control" name="respostas" placeholder="Digite a lacuna e tecle enter..."></textarea>
	</div>
	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/tagify/dist/tagify.css'); ?>">
<script src="<?php echo base_url('assets/tagify/dist/jQuery.tagify.min.js'); ?>"></script>

<script type="text/javascript">
$('[name=respostas]')
    .tagify();
</script>