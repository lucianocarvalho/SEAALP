<h2 class="mb-3"><?php echo $conteudo->titulo; ?></h2>
<a href="<?php echo base_url('painel/exercicios?idConteudo=' . $conteudo->id ); ?>" class="btn btn-secondary"><i class="fas fa-address-book mr-1"></i> Ir para os exercícios</a>

<hr>
<h4>Conteúdo</h4>
<?php echo $conteudo->texto; ?>

<?php if( count( $exemplos ) > 0 ): ?>
	<hr>
	<h4>Exemplos</h4>
	<?php foreach( $exemplos as $exemplo ): ?>
		<div class="exemplo">
			<code><?php echo $exemplo['texto']; ?></code>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if( $this->session->auth ): ?>

	<hr>

	<h4>Anotações</h4>
	<a href="<?php echo base_url('painel/anotacoes/cadastrar/' . $conteudo->id ); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Nova anotação</a>

	<?php if( count( $anotacoes ) == 0 ): ?>
		<p>Sem anotações para esse conteúdo.</p>
	<?php else: ?>
		<table class="table table-striped table-hover mt-3">
			<tbody>
			<?php foreach( $anotacoes as $anotacao ): ?>
				<tr>
					<td><?php echo $anotacao['texto']; ?></td>
					<td align="right">
						<a href="<?php echo base_url('painel/anotacoes/remover/' . $anotacao['id'] ); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> REMOVER</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

<?php endif; ?>