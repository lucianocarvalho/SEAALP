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

<hr>

<h5>Texto:</h5>
<?php echo str_replace('%lacuna%', '<span class="badge badge-dark">LACUNA</span>', $lacunas->texto ); ?>

<h5 class="mt-3">Lacunas:</h5>

<form method="POST" action="<?php echo base_url('painel/exercicios/corrigir'); ?>">
	<div class="form-group">
		<textarea class="form-control" placeholder="Digite a lacuna e tecle enter..." name="lacunas"></textarea>
	</div>

	<input type="hidden" name="idExercicio" value="<?php echo $exercicio->id; ?>">
	<button class="btn btn-success"><i class="fas fa-check"></i> Responder</button>
</form>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/tagify/dist/tagify.css'); ?>">
<script src="<?php echo base_url('assets/tagify/dist/jQuery.tagify.min.js'); ?>"></script>

<script type="text/javascript">
$('[name=lacunas]')
    .tagify({
		maxTags: <?php echo substr_count( $lacunas->texto, '%lacuna%'); ?>
	});
</script>