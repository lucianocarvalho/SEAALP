
<h4 class="mb-3">Conteúdos</h4>

<form method="GET">
	<div class="form-row">
		<div class="col-lg-5">
			<input type="text" class="form-control" name="search" placeholder="Digite a sua busca..." value="<?php echo isset( $search ) ? $search : ''; ?>">
		</div>
		<div class="col-lg-5">
			<select name="idConteudo" class="form-control">
				<option value="">Todos os conteúdos</option>
				<?php foreach( $conteudos as $conteudo ): ?>
					<?php $selected = ( $this->input->get('idConteudo') == $conteudo['id'] ) ? 'selected' : ''; ?>
					<option value="<?php echo $conteudo['id']; ?>" <?php echo $selected; ?>><?php echo $conteudo['titulo']; ?></option>
				<?php endforeach; ?>
			</select>
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

<a href="<?php echo base_url('admin/conteudos/cadastrar'); ?>" class="btn btn-primary mt-3"><i class="fas fa-plus"></i> Novo conteúdo</a>

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
		<th>Conteúdo</th>
		<th style="width:40%"></th>
	</thead>

	<?php if( count( $conteudos ) == 0 ): ?>
		<tbody>
			<tr>
				<td colspan="4">Não foi encontrado nenhum resultado.</td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php foreach( $conteudos as $conteudo ): ?>
				<tr>
					<td class="align-middle"><?php echo $conteudo['titulo']; ?></td>
					<td class="align-middle"><?php echo substr( $conteudo['texto'], 0, 100 ) . '...'; ?></td>
					<td class="align-middle" align="right">
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/conteudos/visualizar/' . $conteudo['id'] ); ?>"><i class="fas fa-eye"></i> Visualizar</a>
						<a class="btn btn-sm btn-dark" href="<?php echo base_url('admin/conteudos/editar/' . $conteudo['id'] ); ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
						<a class="btn btn-sm btn-light" href="<?php echo base_url('admin/exemplos/' . $conteudo['id'] ); ?>"><i class="fas fa-align-justify"></i> Exemplos</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/conteudos/remover/' . $conteudo['id'] ); ?>"><i class="fas fa-times"></i> Remover</a>
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