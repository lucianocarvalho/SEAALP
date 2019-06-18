<h4>Editar professor</h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Nome</label>
		<?php $value = ( set_value('nome') ) ? set_value('nome') : $professor->nome; ?>
		<input type="text" class="form-control" name="nome" placeholder="Digite o seu nome..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Sexo:</label>
		<?php $value = ( set_value('sexo') ) ? set_value('sexo') : $professor->sexo; ?>
		<select name="sexo" class="form-control">
			<option value="M" <?php echo $value == 'M' ? 'selected' : ''; ?>>Masculino</option>
			<option value="F" <?php echo $value == 'F' ? 'selected' : ''; ?>>Feminino</option>
			<option value="P" <?php echo $value == 'P' ? 'selected' : ''; ?>>Prefiro não definir</option>
		</select>
	</div>
	<div class="form-group">
		<label>E-mail</label>
		<?php $value = ( set_value('email') ) ? set_value('email') : $professor->email; ?>
		<input type="text" class="form-control" name="email" placeholder="Digite o seu e-mail..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Digite a sua senha...">
	</div>

	<input type="hidden" class="form-control" name="id" value="<?php echo $professor->id; ?>">
	<input type="hidden" class="form-control" name="perfil" value="<?php echo $professor->perfil; ?>">

	<button type="submit" class="btn btn-primary">Salvar</button>
</form>