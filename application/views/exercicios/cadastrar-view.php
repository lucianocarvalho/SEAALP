<h4>Cadastrar exercício</h4>

<?php echo validation_errors(); ?>

<form method="POST">
	<div class="form-group">
		<label>Conteúdo</label>
		<select class="form-control" name="idConteudo">
			<?php foreach( $conteudos as $conteudo ): ?>
				<option value="<?php echo $conteudo['id']; ?>"><?php echo $conteudo['titulo']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>Tipo</label>
		<select class="form-control" name="tipo">
			<option value="ME">Múltipla escolha</option>
			<option value="CE">Certo ou errado</option>
			<option value="LA">Lacunas</option>
			<option value="OB">Ordenação de blocos</option>
		</select>
	</div>
	<div class="form-group">
		<label>Enunciado</label>
		<textarea class="form-control" name="enunciado" placeholder="Digite o enunciado..."></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>