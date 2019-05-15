
<a href="<?php echo base_url('admin/conteudos/cadastrar'); ?>" class="btn btn-primary">Novo conteúdo</a>

<p class="bold mb-3 mt-3">
	<?php echo count( $conteudos ); ?> registros
	<?php if( count( $conteudos ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $conteudos ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>#</th>
		<th>Título</th>
		<th>Conteúdo</th>
		<th>Exemplos</th>
		<th>Ações</th>
	</thead>

	<?php if( count( $conteudos ) == 0 ): ?>
		<tbody>
			<tr>
				<td colspan="5">Não foi encontrado nenhum resultado.</td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php foreach( $conteudos as $conteudo ): ?>
				<tr>
					<td><?php echo $conteudo['id']; ?></td>
					<td><?php echo $conteudo['titulo']; ?></td>
					<td><?php echo $conteudo['texto']; ?></td>
					<td>10</td>
					<td>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/conteudos/visualizar/' . $conteudo['id'] ); ?>">Visualizar</a>
						<a class="btn btn-sm btn-dark" href="<?php echo base_url('admin/conteudos/editar/' . $conteudo['id'] ); ?>">Editar</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/conteudos/remover/' . $conteudo['id'] ); ?>">Remover</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	<?php endif; ?>
</table>

<?php echo $paginacao; ?>

<p class="bold mb-3 mt-3">
	<?php echo count( $conteudos ); ?> registros
	<?php if( count( $conteudos ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $conteudos ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>