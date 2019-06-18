
<h4 class="mb-3">Professores</h4>

<form method="GET">
	<div class="form-row">
		<div class="col-lg-9">
			<input type="text" class="form-control" name="search" placeholder="Digite a sua busca..." value="<?php echo isset( $search ) ? $search : ''; ?>">
		</div>
		<div class="col-lg-3">
			<div class="w-100 d-table h-100">
            	<div class="w-100 d-table-cell align-middle text-right">
					<button class="btn btn-primary w-100"><i class="fas fa-search"></i> Buscar</button>
				</div>
			</div>
		</div>
	</div>
</form>

<a href="<?php echo base_url('master/professores/cadastrar'); ?>" class="btn btn-primary mt-3"><i class="fas fa-plus"></i> Novo professor</a>

<p class="bold mb-3 mt-3">
	<?php echo count( $professores ); ?> registros
	<?php if( count( $professores ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $professores ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>#</th>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Sexo</th>
		<th></th>
	</thead>

	<?php if( count( $professores ) == 0 ): ?>
		<tbody>
			<tr>
				<td colspan="5">Não foi encontrado nenhum resultado.</td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php foreach( $professores as $professor ): ?>
				<tr>
					<td class="align-middle">#<?php echo $professor['id']; ?></td>
					<td class="align-middle"><?php echo $professor['nome']; ?></td>
					<td class="align-middle"><?php echo $professor['email']; ?></td>
					<td class="align-middle"><?php echo $professor['sexo']; ?></td>
					<td align="right" class="align-middle">
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('master/professores/visualizar/' . $professor['id'] ); ?>"><i class="fas fa-eye"></i> Visualizar</a>
						<a class="btn btn-sm btn-secondary" href="<?php echo base_url('master/professores/editar/' . $professor['id'] ); ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('master/professores/remover/' . $professor['id'] ); ?>"><i class="fas fa-times"></i> Remover</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	<?php endif; ?>
</table>

<?php echo $paginacao; ?>

<p class="bold mb-3 mt-3">
	<?php echo count( $professores ); ?> registros
	<?php if( count( $professores ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $professores ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>