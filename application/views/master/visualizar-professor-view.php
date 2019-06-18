<h4>Professor: <?php echo $professor->nome; ?></h4>

<table class="table">
	<tr>
		<td class="font-weight-bold">Nome</td>
		<td><?php echo $professor->nome; ?></td>
	</tr>
	<tr>
		<td class="font-weight-bold">Sexo</td>
		<td><?php echo $professor->sexo; ?></td>
	</tr>
	<tr>
		<td class="font-weight-bold">E-mail</td>
		<td><?php echo $professor->email; ?></td>
	</tr>
</table>