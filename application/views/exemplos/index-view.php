
<a href="<?php echo base_url('admin/exemplos/cadastrar/' . $id ); ?>" class="btn btn-primary">Novo exemplo</a>

<p class="bold mb-3 mt-3">
	<?php echo count( $exemplos ); ?> registros
	<?php if( count( $exemplos ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $exemplos ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>#</th>
		<th>Texto</th>
		<th>Ações</th>
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
					<td><?php echo $exemplo['id']; ?></td>
					<td><?php echo $exemplo['texto']; ?></td>
					<td>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/conteudos/visualizar/' . $exemplo['id'] ); ?>">Visualizar</a>
						<a class="btn btn-sm btn-dark" href="<?php echo base_url('admin/conteudos/editar/' . $exemplo['id'] ); ?>">Editar</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/conteudos/remover/' . $exemplo['id'] ); ?>">Remover</a>
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