<h4>Aluno: <?php echo $aluno->nome; ?></h4>

<table class="table">
	<tr>
		<td class="font-weight-bold">Nome</td>
		<td><?php echo $aluno->nome; ?></td>
	</tr>
	<tr>
		<td class="font-weight-bold">Sexo</td>
		<td><?php echo $aluno->sexo; ?></td>
	</tr>
	<tr>
		<td class="font-weight-bold">Matrícula</td>
		<td><?php echo $aluno->matricula; ?></td>
	</tr>
	<tr>
		<td class="font-weight-bold">E-mail</td>
		<td><?php echo $aluno->email; ?></td>
	</tr>
</table>