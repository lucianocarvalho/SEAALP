<h4>Cadastre-se!</h4>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<form method="POST">
	<div class="form-group">
		<label>Nome</label>
		<?php $value = ( set_value('nome') ) ? set_value('nome') : ''; ?>
		<input type="text" class="form-control" name="nome" placeholder="Digite o seu nome..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Sexo:</label>
		<select name="sexo" class="form-control">
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
			<option>Prefiro não definir</option>
		</select>
	</div>
	<div class="form-group">
		<label>E-mail</label>
		<?php $value = ( set_value('email') ) ? set_value('email') : ''; ?>
		<input type="text" class="form-control" name="email" placeholder="Digite o seu e-mail..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Matrícula</label>
		<?php $value = ( set_value('matricula') ) ? set_value('matricula') : ''; ?>
		<input type="text" class="form-control" name="matricula" placeholder="Digite o número de sua matrícula..." value="<?php echo $value; ?>">
	</div>
	<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Digite a sua senha...">
	</div>
	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>