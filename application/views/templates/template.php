<!doctype html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="<?php echo base_url('assets/jquery-3.4.1/jquery-3.4.1.min.js'); ?>"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/bootstrap-4.0.0/js/bootstrap.min.js'); ?>"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Saira:400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4.0.0/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
        <title>SEAALP</title>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 logo">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url('assets/images/logo.png'); ?>">
                        </a>
                        <p>Lógica de programação</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="w-100 d-table h-100">
                            <div class="w-100 d-table-cell align-middle text-right">
                                <?php if( isset( $this->session->auth ) ): ?>
                                    <p class="mb-0">
                                        Olá, <b><?php echo $this->session->nome; ?></b>
                                        <?php if( $this->session->perfil == "P" ): ?>
                                            <span class="badge badge-primary">Professor</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Aluno</span>
                                        <?php endif; ?>
                                        <a href="<?php echo base_url('logout'); ?>" class="btn btn-sm btn-danger ml-2">Logout <i class="fas fa-sign-out-alt"></i></a>
                                    </p>                                
                                <?php else: ?>
                                    <a href="<?php echo base_url('login'); ?>" class="btn btn-sm btn-primary">Login</a>
                                    <a href="<?php echo base_url('cadastrar'); ?>" class="btn btn-sm btn-secondary">Cadastre-se</a>
                                    <a href="<?php echo base_url('visitante'); ?>" class="btn btn-sm btn-dark">Iniciar como visitante</a>
                                <?php endif; ?>         
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </header>

        <?php if( $this->session->perfil == "P" ): ?>
            <div class="container mb-3">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
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
                                        <a class="nav-link" href="<?php echo base_url('admin/exercicios'); ?>">Exercícios</a>
                                    </li>
                                </ul>
                            </div><!-- navbar-collapse -->
                        </nav>
                    </div><!-- col-lg-12 -->
                </div><!-- row -->
            </div><!-- container -->
        <?php endif; ?>

        <?php if( $this->session->perfil == "A" ): ?>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-dark">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('/'); ?>"><i class="fas fa-home"></i> Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('painel/conteudos'); ?>"><i class="fas fa-align-justify"></i> Conteúdos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('painel/exercicios'); ?>"><i class="fas fa-address-book"></i> Exercícios</a>
                                        </li>
                                    </ul>
                                </div><!-- navbar-collapse -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>        
        <?php endif; ?>

        <div class="container mt-4 mb-4">
            <?php if( $this->flashmessages->hasMessages() ): ?>
                <div class="alerts"><?php $this->flashmessages->display(); ?></div>
            <?php endif; ?>

            <?php echo $contents; ?>
        </div>

        <footer class="text-muted mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-md-4 text-center">
                        <p class="mb-0">Desenvolvido por alunos da Fatec Ourinhos como trabalho de conclusão de curso.</p>
                        <p class="mb-0 font-weight-bold">MeuAprendizado - <?php echo date('Y'); ?></p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>