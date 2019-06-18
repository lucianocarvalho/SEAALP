<div class="row">
	<div class="col-md-4 offset-md-4">
		<h4 class="text-center">Login</h4>
		<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<form method="POST">
			<div class="form-group">
				<label>E-mail</label>
				<?php $value = ( set_value('email') ) ? set_value('email') : ''; ?>
				<input type="text" class="form-control" name="email" placeholder="Digite o seu e-mail..." value="<?php echo $value; ?>">
			</div>
			<div class="form-group">
				<label>Senha</label>
				<input type="password" class="form-control" name="senha" placeholder="Digite a sua senha...">
			</div>
			<button type="submit" class="btn btn-primary w-100">Login</button>
		</form>
	</div>
</div>