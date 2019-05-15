<?php echo validation_errors(); ?>

<h4>Login</h4>
<form method="POST" action="<?php echo base_url('login/auth'); ?>">
	<div class="form-group">
		<label>E-mail</label>
		<input type="text" class="form-control" name="email" placeholder="Digite o seu e-mail...">
	</div>
	<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Digite a sua senha...">
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>