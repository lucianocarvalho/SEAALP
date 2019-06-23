
<h4 class="mb-3">Anotações</h4>

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
	<?php echo count( $anotacoes ); ?> registros
	<?php if( count( $anotacoes ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $anotacoes ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th>Texto</th>
		<th>Conteúdo</th>
		<th style="width:40%"></th>
	</thead>

	<?php if( count( $anotacoes ) == 0 ): ?>
		<tbody>
			<tr>
				<td colspan="4">Não foi encontrado nenhum resultado.</td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php foreach( $anotacoes as $anotacao ): ?>
				<tr>
					<td class="align-middle"><?php echo $anotacao['texto']; ?></td>
					<td class="align-middle">
						<a href="<?php echo base_url('painel/conteudos/visualizar/' . $anotacao['idConteudo'] ); ?>"><?php echo $anotacao['titulo']; ?></a>
					</td>
					<td class="align-middle" align="right">
						<a class="btn btn-sm btn-secondary" href="<?php echo base_url('painel/anotacoes/editar/' . $anotacao['id'] ); ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('painel/anotacoes/remover/' . $anotacao['id'] ); ?>"><i class="fas fa-times"></i> Remover</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	<?php endif; ?>
</table>

<?php echo $paginacao; ?>

<p class="bold mb-3 mt-3">
	<?php echo count( $anotacoes ); ?> registros
	<?php if( count( $anotacoes ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $anotacoes ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>