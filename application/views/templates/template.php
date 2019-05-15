<!doctype html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4.0.0/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
        <title>SEAALP</title>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="d-table h-100">
                            <h1>Meu aprendizado</h1>
                            <p>Lógica de programação</p>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="d-table h-100">
                            <?php if( isset( $this->session->auth ) ): ?>
                                <p class="mb-0">Olá, <b><?php echo $this->session->nome; ?></b>.</p>

                                <?php if( $this->session->perfil == "P" ): ?>
                                    <p class="mb-0">Você está logado como <span class="badge badge-primary">Professor</span></p>
                                <?php else: ?>
                                    <p class="mb-0">Você está logado como <span class="badge badge-secondary">Aluno</span></p>
                                <?php endif; ?>

                                <p class="mb-0">
                                    <a href="<?php echo base_url('logout'); ?>" class="btn btn-sm btn-danger">Logout</a>
                                </p>                                
                            <?php else: ?>
                                <a href="<?php echo base_url('login'); ?>" class="btn btn-sm btn-primary">Login</a>
                                <a href="<?php echo base_url('cadastrar'); ?>" class="btn btn-sm btn-secondary">Cadastre-se</a>
                                <a href="<?php echo base_url('visitante'); ?>" class="btn btn-sm btn-info">Iniciar como visitante</a>
                            <?php endif; ?>
                        </div>                
                    </div>
                </div><!-- row -->
            </div>
        </header>

        <?php if( $this->session->perfil == "P" ): ?>
            <div class="container mb-3">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('admin'); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('admin/conteudos'); ?>">Conteúdos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('admin/exemplos'); ?>">Exemplos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('admin/exercicios'); ?>">Exercícios</a>
                                    </li>
                                </ul>
                            </div><!-- navbar-collapse -->
                        </nav>
                    </div><!-- col-lg-12 -->
                </div><!-- row -->
            </div><!-- container -->
        <?php endif; ?>

        <div class="container">
            <?php if( $this->flashmessages->hasMessages() ): ?>
                <div class="alerts"><?php $this->flashmessages->display(); ?></div>
            <?php endif; ?>

            <?php echo $contents; ?>
        </div>

        <footer class="bg-light text-muted">
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