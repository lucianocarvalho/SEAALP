<h4 class="mb-3"><?php echo $conteudo->titulo; ?></h4>

<a href="<?php echo base_url('admin/exemplos/cadastrar/' . $conteudo->id ); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Novo exemplo</a>

<p class="bold mb-3 mt-3">
	<?php echo count( $exemplos ); ?> registros
	<?php if( count( $exemplos ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $exemplos ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>Texto</th>
		<th></th>
	</thead>

	<?php if( count( $exemplos ) == 0 ): ?>
		<tbody>
			<tr>
				<td colspan="3">Não foi encontrado nenhum resultado.</td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php foreach( $exemplos as $exemplo ): ?>
				<tr>
					<td class="align-middle"><?php echo $exemplo['texto']; ?></td>
					<td align="right" class="align-middle">
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/exemplos/visualizar/' . $exemplo['id'] ); ?>"><i class="fas fa-eye"></i> Visualizar</a>
						<a class="btn btn-sm btn-dark" href="<?php echo base_url('admin/exemplos/editar/' . $exemplo['id'] ); ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/exemplos/remover/' . $exemplo['id'] ); ?>"><i class="fas fa-times"></i> Remover</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	<?php endif; ?>
</table>

<?php echo $paginacao; ?>

<p class="bold mb-3 mt-3">
	<?php echo count( $exemplos ); ?> registros
	<?php if( count( $exemplos ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $exemplos ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>