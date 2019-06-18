<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<h4><?php echo $exercicio->enunciado; ?></h4>

<form method="POST">
	<p class="mb-0">Escreva o texto corrido normalmente, mas escreva <b>; (ponto e vírgula)</b> no local de separação dos blocos</small>

	<hr>
	<p class="font-weight-bold mb-1">Exemplo de preenchimento:</p>
	<p class="mb-0"><b>Texto normal:</b> Java é uma linguagem de programação criada pela Sun Microsystems em 1995.</p>
	<p class="mb-0"><b>Blocos desejáveis:</b> [Java é uma] [linguagem de programação] [criada pela] [Sun Microsystems em 1995].</p>
	<p class="mb-0"><b>Modo de preencher:</b> Java é uma<b>;</b> linguagem de programação<b>;</b> criada pela<b>;</b> Sun Microsystems em 1995.</p>
	<hr>

	<textarea class="form-control mb-2" name="texto" placeholder="Digite aqui a frase..." rows="4"></textarea>
	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button type="submit" class="btn btn-primary">Salvar</button>
</form>