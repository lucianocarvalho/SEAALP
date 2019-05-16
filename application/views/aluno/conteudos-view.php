<form method="GET">
	<div class="form-row">
		<div class="col-lg-10">
			<input type="text" class="form-control" name="search" placeholder="Digite a sua busca..." value="<?php echo isset( $search ) ? $search : ''; ?>">
		</div>
		<div class="col-lg-2">
			<div class="w-100 d-table h-100">
            	<div class="w-100 d-table-cell align-middle text-right">
					<button class="btn btn-primary w-100"><i class="fas fa-search"></i> Buscar</button>
				</div>
			</div>
		</div>
	</div>
</form>

<p class="bold mb-3 mt-3">
	<?php echo count( $conteudos ); ?> registros
	<?php if( count( $conteudos ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $conteudos ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>Título</th>
		<th>Duração aproximada</th>
		<th class="w-25 text-center"><i class="fas fa-play"></i></th>
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
					<td><?php echo $conteudo['titulo']; ?></td>
					<td><?php echo reading_time( $conteudo['texto'] ); ?></td>
					<td align="center">
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/conteudos/visualizar/' . $conteudo['id'] ); ?>"><i class="fas fa-play"></i> Iniciar conteúdo</a>
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