<h4 class="mb-3">Exercícios</h4>

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

<p class="bold mb-3 mt-3">
	<?php echo count( $exercicios ); ?> registros
	<?php if( count( $exercicios ) > 0 ): ?>
	<small>(de <?php echo $pagina + 1; ?> até <?php echo $pagina + count( $exercicios ); ?> de um total de <?php echo $total_registros; ?> registros - Página <?php echo ( $pagina / $quantity ) + 1; ?> - Exibindo até <?php echo $quantity; ?> resultados)</small>
	<?php endif; ?>
</p>

<?php echo $paginacao; ?>

<table class="table table-hover table-striped">
	<thead>
		<th class="w-25">Enunciado</th>
		<th>Conteúdo</th>
		<th class="text-center">Tipo</th>
		<th></th>
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
					<td class="align-middle"><?php echo $exercicio['enunciado']; ?></td>
					<td class="align-middle"><?php echo $exercicio['titulo']; ?></td>
					<td class="align-middle text-center">
						<?php if( $exercicio['tipo'] == "ME" ): ?>
							<span class="badge badge-pill badge-primary">Múltipla escolha</span>
						<?php elseif( $exercicio['tipo'] == "CE" ): ?>
							<span class="badge badge-pill badge-danger">Certo ou errado</span>
						<?php elseif( $exercicio['tipo'] == "LA" ): ?>
							<span class="badge badge-pill badge-warning">Lacunas</span>
						<?php elseif( $exercicio['tipo'] == "BO" ): ?>
							<span class="badge badge-pill badge-dark">Blocos</span>
						<?php endif; ?>
					</td>
					<td class="align-middle" align="right">
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('painel/exercicios/realizar/' . $exercicio['id'] ); ?>"> Exercitar <i class="fas fa-angle-double-right"></i></a>
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