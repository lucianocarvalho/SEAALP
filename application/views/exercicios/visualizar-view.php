<h4><?php echo $exercicio->enunciado; ?></h4>

<table class="table">
	<tr>
		<td class="font-weight-bold">Enunciado</td>
		<td><?php echo $exercicio->enunciado; ?></td>
	</tr>
	<tr>
		<td class="font-weight-bold">Tipo</td>
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

	<?php if( $exercicio->tipo == "ME" ): ?>
		<tr>
			<td class="font-weight-bold">Alternativas:</td>
			<td>
				<table class="w-100">
					<?php foreach( $alternativas as $alternativa ): ?>
						<?php $class = ( $alternativa['correta'] == 1 ) ? 'table-success' : 'table-danger'; ?>
						<tr class="<?php echo $class; ?>">
							<td><?php echo $alternativa['texto']; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</td>
		</tr>
	<?php endif; ?>

	<?php if( $exercicio->tipo == "CE" ): ?>
		<tr>
			<td class="font-weight-bold">Resposta correta:</td>
			<td>
				<?php if( $resposta->correta == 1 ): ?>
					<span class="badge badge-success">Certo</span>
				<?php else: ?>
					<span class="badge badge-danger">Errado</span>
				<?php endif; ?>
			</td>
		</tr>
	<?php endif; ?>

	<?php if( $exercicio->tipo == "LA" ): ?>
		<tr>
			<td class="font-weight-bold">Texto correto:</td>
			<td>
				<?php $lacunas = explode('%lacuna%', trim( $lacuna->texto ) ); ?>
				<?php $respostas = unserialize( $lacuna->respostas ); ?>
				<?php $answers = array_reverse( $respostas ); ?>

				<?php foreach( $lacunas as $key=>$lacuna ): ?>
					<?php echo $lacuna; ?>
					<span class="badge badge-success"><?php echo array_pop( $answers ); ?></span>
				<?php endforeach; ?>
			</td>
		</tr>
	<?php endif; ?>

	<?php if( $exercicio->tipo == "BO" ): ?>
		<tr>
			<td class="font-weight-bold">Ordem correta:</td>
			<td>
				<?php $palavras = explode(' ', $frase->texto ); ?>

				<?php foreach( $palavras as $palavra ): ?>
					<span class="badge badge-pill badge-secondary"><?php echo $palavra; ?></span>
				<?php endforeach; ?>
			</td>
		</tr>
	<?php endif; ?>
</table>