<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<table class="table">
	<tbody>
		<tr>
			<td class="font-weight-bold">Conteúdo:</td>
			<td>
				<?php echo $conteudo->titulo; ?>
				<a href="<?php echo base_url('painel/conteudos/visualizar/' . $conteudo->id ); ?>" class="btn btn-sm btn-primary ml-3">Acessar conteúdo <i class="fas fa-angle-right ml-1"></i></a>
			</td>
		</tr>
		<tr>
			<td class="font-weight-bold">Tipo:</td>
			<td>
				<?php if( $exercicio->tipo == "ME" ): ?>
					<span class="badge badge-pill badge-primary">Múltipla escolha</span>
				<?php elseif( $exercicio->tipo == "CE" ): ?>
					<span class="badge badge-pill badge-danger">Certo ou errado</span>
				<?php elseif( $exercicio->tipo == "LA" ): ?>
					<span class="badge badge-pill badge-warning">Lacunas</span>
				<?php elseif( $exercicio->tipo == "BO" ): ?>
					<span class="badge badge-pill badge-dark">Blocos</span>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="font-weight-bold">Suas anotações:</td>
			<td>
				<?php if( count( $anotacoes ) > 0 ): ?>
					<?php foreach( $anotacoes as $anotacao ): ?>
						<p class="mb-0"><?php echo $anotacao['texto']; ?></p>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="mb-0 text-muted">Sem anotações</p>
				<?php endif; ?>
			</td>
		</tr>
	</tbody>
</table>

<hr>

<h5>Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<h5 class="mt-3">Alternativas:</h5>

<form method="POST" action="<?php echo base_url('painel/exercicios/corrigir'); ?>">
	<div class="form-check">
		<label>
			<input class="form-check-input" type="radio" name="alternativa" value="1"> Certo
		</label>
	</div>
	<div class="form-check">
		<label>
			<input class="form-check-input" type="radio" name="alternativa" value="0"> Errado
		</label>
	</div>

	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button class="btn btn-success"><i class="fas fa-check"></i> Responder</button>
</form>