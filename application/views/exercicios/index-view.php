
<a href="<?php echo base_url('admin/exercicios/cadastrar'); ?>" class="btn btn-primary">Novo exercício</a>

<p class="bold mb-3 mt-3">
	<?php echo count( $exercicios ); ?> registros
	<?php if( count( $exercicios ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $exercicios ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>#</th>
		<th>Enunciado</th>
		<th>Tipo</th>
		<th>Ações</th>
	</thead>

	<?php if( count( $exercicios ) == 0 ): ?>
		<tbody>
			<tr>
				<td colspan="5">Não foi encontrado nenhum resultado.</td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php foreach( $exercicios as $exercicio ): ?>
				<tr>
					<td><?php echo $exercicio['id']; ?></td>
					<td><?php echo $exercicio['enunciado']; ?></td>
					<td><?php echo $exercicio['tipo']; ?></td>
					<td>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/conteudos/visualizar/' . $exercicio['id'] ); ?>">Visualizar</a>
						<a class="btn btn-sm btn-dark" href="<?php echo base_url('admin/conteudos/editar/' . $exercicio['id'] ); ?>">Editar</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/conteudos/remover/' . $exercicio['id'] ); ?>">Remover</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	<?php endif; ?>
</table>

<?php echo $paginacao; ?>

<p class="bold mb-3 mt-3">
	<?php echo count( $exercicios ); ?> registros
	<?php if( count( $exercicios ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $exercicios ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>