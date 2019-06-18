<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<h4><?php echo $exercicio->enunciado; ?></h4>

<form method="POST">
	<div class="form-group">
		<p class="mb-0">Escreva o texto corrido normalmente, mas escreva <b>LACUNA</b> no local em que o aluno deve preencher.</small>
		<p class="mb-0">Posteriormente, preencha os valores correspondentes às lacunas abaixo.</small>
		
		<hr>
		<p class="font-weight-bold mb-1">Exemplo de preenchimento:</p>
		<p class="mb-0"><b>Texto normal:</b> Java é uma linguagem de programação criada pela Sun Microsystems em 1995.</p>
		<p class="mb-0"><b>Texto corrido:</b> Java é uma <b>LACUNA</b> criada pela <b>LACUNA</b> em 1995.</p>
		<p class="mb-0"><b>Lacunas:</b> <i>linguagem de programação</i>, <i>Sun Microsystems</i></p>
		<hr>

		<label>Texto corrido:</label>
		<textarea class="form-control" name="texto" placeholder="Digite o texto corrido..."></textarea>
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