
<!doctype html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4.0.0/css/bootstrap.min.css'); ?>">
        <title>SEAALP</title>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h1>Meu aprendizado</h1>
                        <p>Lógica de programação</p>
                    </div>

                    <div class="col-lg-5">
                        <a href="<?php echo base_url('login'); ?>" class="btn btn-sm btn-primary">Login</a>
                        <a href="<?php echo base_url('cadastrar'); ?>" class="btn btn-sm btn-secondary">Cadastre-se</a>
                        <a href="<?php echo base_url('visitante'); ?>" class="btn btn-sm btn-info">Iniciar como visitante</a>
                    </div>
                </div><!-- row -->
            </div>
        </header>

        <div class="container">
            <?php echo $contents; ?>
        </div>

        <footer class="text-muted">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        Desenvolvido por alunos da Fatec Ourinhos como trabalho de conclusão de curso.
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>