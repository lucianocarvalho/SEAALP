<?php

class Migration_Initial_Schema extends CI_Migration {

    public function __construct() {
        @ini_set('max_execution_time', 0);
        @ini_set('memory_limit','2048M');

        $this->load->helper("foreign_key");

        // Carregamos as classes.
        $this->load->library('acesso_ftp');
        $this->load->library('ajuda_categoria');
        $this->load->library('ajuda_questao');
        $this->load->library('arquivo');
        $this->load->library('arquivo_download');
        $this->load->library('cliente');
        $this->load->library('configuracao');
        $this->load->library('email_alternativo');
        $this->load->library('estrutura');
        $this->load->library('estrutura_pasta');
        $this->load->library('log_acesso');
        $this->load->library('log_acao');
        $this->load->library('telefone');
        $this->load->library('usuario');
        $this->load->library('notificacao');
        $this->load->library('mensagem');
        $this->load->library('fila_email');
        $this->load->library('recuperacao_senha');
    }

    /**
     * Método para atualizar todas as tabelas do banco de dados.
     */
    public function up() {

        // $this->down();
        
        $attributes = array('ENGINE' => 'InnoDB');

        $this->dbforge->add_field( $this->acesso_ftp->schema() );
        $this->dbforge->add_key('ftpID', TRUE );
        $this->dbforge->create_table('acessos_ftps', TRUE, $attributes );

        $this->dbforge->add_field( $this->ajuda_categoria->schema() );
        $this->dbforge->add_key('categoriaID', TRUE );
        $this->dbforge->create_table('ajudas_categorias', TRUE, $attributes );

        $this->dbforge->add_field( $this->ajuda_questao->schema() );
        $this->dbforge->add_key('ajudaID', TRUE );
        $this->dbforge->create_table('ajudas_questoes', TRUE, $attributes );

        $this->dbforge->add_field( $this->arquivo->schema() );
        $this->dbforge->add_key('arquivoID', TRUE );
        $this->dbforge->create_table('arquivos', TRUE, $attributes );

        $this->dbforge->add_field( $this->arquivo_download->schema() );
        $this->dbforge->add_key('downloadID', TRUE );
        $this->dbforge->create_table('arquivos_downloads', TRUE, $attributes );

        $this->dbforge->add_field( $this->cliente->schema() );
        $this->dbforge->add_key('clienteID', TRUE );
        $this->dbforge->create_table('clientes', TRUE, $attributes );

        $this->dbforge->add_field( $this->configuracao->schema() );
        $this->dbforge->add_key('configuracaoID', TRUE );
        $this->dbforge->create_table('configuracoes', TRUE, $attributes );

        $this->dbforge->add_field( $this->email_alternativo->schema() );
        $this->dbforge->add_key('emailID', TRUE );
        $this->dbforge->create_table('emails_alternativos', TRUE, $attributes );

        $this->dbforge->add_field( $this->estrutura->schema() );
        $this->dbforge->add_key('estruturaID', TRUE );
        $this->dbforge->create_table('estruturas', TRUE, $attributes );

        $this->dbforge->add_field( $this->estrutura_pasta->schema() );
        $this->dbforge->add_key('estruturaPastaID', TRUE );
        $this->dbforge->create_table('estruturas_pastas', TRUE, $attributes );

        $this->dbforge->add_field( $this->log_acesso->schema() );
        $this->dbforge->add_key('acessoID', TRUE );
        $this->dbforge->create_table('logs_acessos', TRUE, $attributes );

        $this->dbforge->add_field( $this->log_acao->schema() );
        $this->dbforge->add_key('acaoID', TRUE );
        $this->dbforge->create_table('logs_acoes', TRUE, $attributes );

        $this->dbforge->add_field( $this->telefone->schema() );
        $this->dbforge->add_key('telefoneID', TRUE );
        $this->dbforge->create_table('telefones', TRUE, $attributes );

        $this->dbforge->add_field( $this->usuario->schema() );
        $this->dbforge->add_key('usuarioID', TRUE );
        $this->dbforge->create_table('usuarios', TRUE, $attributes );

        $this->dbforge->add_field( $this->notificacao->schema() );
        $this->dbforge->add_key('notificacaoID', TRUE );
        $this->dbforge->create_table('notificacoes', TRUE, $attributes );

        $this->dbforge->add_field( $this->mensagem->schema() );
        $this->dbforge->add_key('mensagemID', TRUE );
        $this->dbforge->create_table('mensagens', TRUE, $attributes );

        $this->dbforge->add_field( $this->fila_email->schema() );
        $this->dbforge->add_key('filaID', TRUE );
        $this->dbforge->create_table('fila_emails', TRUE, $attributes );

        $this->dbforge->add_field( $this->recuperacao_senha->schema() );
        $this->dbforge->add_key('recuperacaoID', TRUE );
        $this->dbforge->create_table('recuperacao_senha', TRUE, $attributes );

        /**
         * Criamos as chaves estrangeiras.
         */
        $this->db->query( add_foreign_key('ajudas_questoes', 'categoriaID', 'ajudas_categorias(categoriaID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('arquivos', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('arquivos', 'estruturaID', 'estruturas(estruturaID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('arquivos', 'arquivoRemetenteID', 'usuarios(usuarioID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('arquivos_downloads', 'arquivoID', 'arquivos(arquivoID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('arquivos_downloads', 'usuarioID', 'usuarios(usuarioID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('clientes', 'clienteAdminID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('clientes', 'ftpID', 'acessos_ftps(ftpID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('configuracoes', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('emails_alternativos', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('estruturas_pastas', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('estruturas', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('estruturas', 'estruturaPastaID', 'estruturas_pastas(estruturaPastaID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('estruturas', 'estruturaIDPai', 'estruturas(estruturaID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('logs_acoes', 'acessoID', 'logs_acessos(acessoID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('logs_acessos', 'usuarioID', 'usuarios(usuarioID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('telefones', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('usuarios', 'clienteID', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('notificacoes', 'clienteIDRemetente', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('notificacoes', 'usuarioIDDestinatario', 'usuarios(usuarioID)', 'RESTRICT', 'RESTRICT') );

        $this->db->query( add_foreign_key('mensagens', 'clienteIDRemetente', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );
        $this->db->query( add_foreign_key('mensagens', 'clienteIDDestinatario', 'clientes(clienteID)', 'RESTRICT', 'RESTRICT') );
    }

    /**
     * Método para baixar todas as tabelas do banco de dados.
     */
    public function down() {

        /**
         * Dropamos as FK antes de excluírmos as tabelas.
         */
        $this->db->query( drop_foreign_key('ajudas_questoes', 'categoriaID') );
        $this->db->query( drop_index('ajudas_questoes', 'categoriaID') );

        $this->db->query( drop_foreign_key('arquivos', 'clienteID') );
        $this->db->query( drop_index('arquivos', 'clienteID') );
        $this->db->query( drop_foreign_key('arquivos', 'estruturaID') );
        $this->db->query( drop_index('arquivos', 'estruturaID') );
        $this->db->query( drop_foreign_key('arquivos', 'arquivoRemetenteID') );
        $this->db->query( drop_index('arquivos', 'arquivoRemetenteID') );

        $this->db->query( drop_foreign_key('arquivos_downloads', 'arquivoID') );
        $this->db->query( drop_index('arquivos_downloads', 'arquivoID') );
        $this->db->query( drop_foreign_key('arquivos_downloads', 'usuarioID') );
        $this->db->query( drop_index('arquivos_downloads', 'usuarioID') );

        $this->db->query( drop_foreign_key('clientes', 'ftpID') );
        $this->db->query( drop_index('clientes', 'ftpID') );

        $this->db->query( drop_foreign_key('configuracoes', 'clienteID') );
        $this->db->query( drop_index('configuracoes', 'clienteID') );

        $this->db->query( drop_foreign_key('emails_alternativos', 'clienteID') );
        $this->db->query( drop_index('emails_alternativos', 'clienteID') );

        $this->db->query( drop_foreign_key('estruturas', 'clienteID') );
        $this->db->query( drop_index('estruturas', 'clienteID') );
        $this->db->query( drop_foreign_key('estruturas', 'estruturaPastaID') );
        $this->db->query( drop_index('estruturas', 'estruturaPastaID') );
        $this->db->query( drop_foreign_key('estruturas', 'estruturaIDPai') );
        $this->db->query( drop_index('estruturas', 'estruturaIDPai') );
         
        $this->db->query( drop_foreign_key('estruturas_pastas', 'clienteID') );
        $this->db->query( drop_index('estruturas_pastas', 'clienteID') );

        $this->db->query( drop_foreign_key('logs_acoes', 'acessoID') );
        $this->db->query( drop_index('logs_acoes', 'acessoID') );

        $this->db->query( drop_foreign_key('logs_acessos', 'usuarioID') );
        $this->db->query( drop_index('logs_acessos', 'usuarioID') );

        $this->db->query( drop_foreign_key('telefones', 'clienteID') );
        $this->db->query( drop_index('telefones', 'clienteID') );

        $this->db->query( drop_foreign_key('usuarios', 'clienteID') );
        $this->db->query( drop_index('usuarios', 'clienteID') );

        $this->db->query( drop_foreign_key('notificacoes', 'clienteIDRemetente') );
        $this->db->query( drop_index('notificacoes', 'clienteIDRemetente') );
        $this->db->query( drop_foreign_key('notificacoes', 'clienteIDDestinatario') );
        $this->db->query( drop_index('notificacoes', 'clienteIDDestinatario') );
        
        $this->db->query( drop_foreign_key('mensagens', 'clienteIDRemetente') );
        $this->db->query( drop_index('mensagens', 'clienteIDRemetente') );
        $this->db->query( drop_foreign_key('mensagens', 'clienteIDDestinatario') );
        $this->db->query( drop_index('mensagens', 'clienteIDDestinatario') );

        $this->dbforge->drop_table('acessos_ftps', TRUE );
        $this->dbforge->drop_table('ajudas_categorias', TRUE );
        $this->dbforge->drop_table('ajudas_questoes', TRUE );
        $this->dbforge->drop_table('arquivos', TRUE );
        $this->dbforge->drop_table('arquivos_downloads', TRUE );
        $this->dbforge->drop_table('clientes', TRUE );
        $this->dbforge->drop_table('configuracoes', TRUE );
        $this->dbforge->drop_table('emails_alternativos', TRUE );
        $this->dbforge->drop_table('estruturas', TRUE );
        $this->dbforge->drop_table('estruturas_pastas', TRUE );
        $this->dbforge->drop_table('logs_acessos', TRUE );
        $this->dbforge->drop_table('logs_acoes', TRUE );
        $this->dbforge->drop_table('telefones', TRUE );
        $this->dbforge->drop_table('usuarios', TRUE );
        $this->dbforge->drop_table('notificacoes', TRUE );
        $this->dbforge->drop_table('mensagens', TRUE );
        $this->dbforge->drop_table('fila_emails', TRUE );
    }
}