<h4 class="mb-3">Exercício #<?php echo $exercicio->id; ?></h4>

<h5 class="mt-3">Enunciado:</h5>
<?php echo $exercicio->enunciado; ?>

<hr>

<h5 class="mt-3 font-weight-bold">Resposta correta:</h5>
<?php $textos = explode('LACUNA', $lacuna->texto ); ?>
<?php $respostas = unserialize( $lacuna->respostas ); ?>
<?php $lacunas = explode(',', $this->input->post('lacunas', TRUE ) ); ?>

<?php
    $lacunas = array();
    $each = json_decode( $this->input->post('lacunas') );
    foreach( $each as $lacuna ) {
        $lacunas[] = $lacuna->value;
    }
?>

<?php $answers = array_reverse( $respostas ); ?>
<?php foreach( $textos as $texto ): ?>
    <?php echo $texto; ?>
    <span class="badge badge-success"><?php echo array_pop( $answers ); ?></span>
<?php endforeach; ?>

<h5 class="mt-3 font-weight-bold">Suas respostas:</h5>

<table class="table">
    <thead>
        <th>#</th>
        <th>Resposta correta</th>
        <th>Sua resposta</th>
    </thead>
<?php foreach( $respostas as $key=>$resposta ): ?>
    <?php $class = ( $lacunas[ $key ] == $resposta ) ? 'table-success' : 'table-danger'; ?>

    <tr class="<?php echo $class; ?>">
        <td><?php echo $key + 1; ?></td>
        <td><?php echo $resposta; ?></td>
        <td><?php echo $lacunas[ $key ]; ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?php if( ! is_null( $proximo_exercicio ) ): ?>
	<a href="<?php echo base_url('painel/exercicios/realizar/' . $proximo_exercicio->id ); ?>" class="btn btn-success"> Próximo exercício <i class="fas fa-arrow-right"></i></a>
<?php endif; ?>

<a href="<?php echo base_url('painel/exercicios'); ?>" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Voltar aos exercícios</a>