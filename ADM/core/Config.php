<?php

namespace Core;

/**
 * Classe abstrata para configuração básica do sistema.
 *
 * Esta classe define constantes de configuração para URLs, controladores e métodos padrão.
 * É usada como base para outras classes de configuração do sistema.
 */
abstract class Config
{
    /**
     * Configuração para o ambiente administrativo.
     *
     * Este método define constantes importantes para URLs, como a URL base do site,
     * a URL para a área administrativa, o controlador padrão, o método padrão e o controlador
     * de erro em caso de falhas.
     *
     * @return void
     */
    protected function configAdm()
    {
        // Define a URL base do site
        define('URL', 'http://localhost/curso-celke/');

        // Define a URL da área administrativa
        define('URLADM', 'http://localhost/curso-celke/adm/');

        // Define o controlador padrão
        define('CONTROLLER', 'Login');

        // Define o método padrão
        define('METODO', 'index');

        // Define o controlador de erro padrão
        define('CONTROLLERERRO', 'Erro');

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'celke-curso');
        define('PORT', '3306');

        define('EMAILADM', 'luisa.ramos@alcon.com.br');
    }
}