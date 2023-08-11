<?php

namespace Core;

/**
 * Classe para configuração de URLs, roteamento e carregamento de controladores e métodos.
 */

class ConfigController extends Config
{
    /** @var string $url Recebe a URL do .htaccess */
    private string $url;

    /** @var array $urlArray Armazena partes da URL divididas por '/' */
    private array $urlArray;

    /** @var string $urlController Armazena o nome do controlador obtido da URL */
    private string $urlController;

    /** @var string $urlMetodo Recebe da URL o nome do método */
    private string $urlMetodo;

    /** @var string $urlParameter Armazena um possível parâmetro da URL. */
    private string $urlParameter;

    /** @var string $classLoad Armazena o namespace e nome da classe do controlador. */
    private string $classLoad;

    /** @var array $format Armazena arrays de formatação para conversão de caracteres especiais. */
    private array $format;

    /** @var string $urlSlugController Armazena o nome do controlador formatado como um slug */
    private string $urlSlugController;

    /** @var string $urlSlugMetodo Armazena o nome do método formatado como um slug */
    private string $urlSlugMetodo;


    /**
     * Este método é responsável por inicializar a configuração de URLs e carregar informações
     * sobre controladores, métodos e parâmetros da URL.
     *
     * Recebe a URL do .htaccess
     * Validar a URL
     */
    public function __construct()
    {
        // Configura a administração
        $this->configAdm();

        // Verifica se a variável 'url' está presente na consulta GET
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            // Obtém a URL da consulta GET
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //var_dump($this->url);

            // Limpa a URL de tags e espaços
            $this->clearUrl();

            // Divide a URL em partes usando o caractere '/'
            $this->urlArray = explode("/", $this->url);
            //var_dump($this->urlArray);

            // Verifica se as partes da URL existem
            // URL/Controller/Metodo/Parametro
            if (isset($this->urlArray[0])) {
                // Define o nome do controlador formatado como um slug
                $this->urlController = $this->slugController($this->urlArray[0]);
            } else {
                // Define o nome do controlador padrão formatado como um slug
                $this->urlController = $this->slugController(CONTROLLER);
            }

            // Verifica se o método está definido na URL
            if (isset($this->urlArray[1])) {
                // Define o nome do método formatado como um slug
                $this->urlMetodo = $this->slugMetodo($this->urlArray[1]);
            } else {
                // Define o nome do método padrão formatado como um slug
                $this->urlMetodo = $this->slugMetodo(METODO);
            }

            // Verifica se um parâmetro está definido na URL
            if (isset($this->urlArray[2])) {
                // Define o valor do parâmetro
                $this->urlParameter = $this->urlArray[2];
            } else {
                // Define um valor padrão para o parâmetro
                $this->urlParameter = "";
            }

            //define valores padrões para Controller, Método e Erro
        } else {
            $this->urlController = $this->slugController(CONTROLLERERRO);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->urlParameter = "";
        }

        // Exibe as informações da URL
        //echo "Controller: {$this->urlController} <br>";
        //echo "Metodo: {$this->urlMetodo} <br>";
        //echo "Parametro: {$this->urlParameter} <br>";
    }

    /**
     * Limpa a URL, removendo tags, espaços em branco e aplicando formatação de slug.
     *
     * @return void
     */
    private function clearUrl(): void
    {
        // Elimina tags HTML
        $this->url = strip_tags($this->url);

        // Elimina espaços em branco no início e no final
        $this->url = trim($this->url);

        // Elimina a barra no final da URL
        $this->url = rtrim($this->url, "/");

        // Substitui caracteres especiais usando mapeamento
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
        $this->url = strtr(mb_convert_encoding($this->url, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($this->format['a'], 'ISO-8859-1', 'UTF-8'), $this->format['b']);
    }

    /**
     * Converte o nome do controlador para um formato de slug.
     *
     * Este método recebe um nome de controlador e aplica uma série de formatações para transformá-lo
     * em um formato de slug, tornando-o adequado para uso em URLs.
     *
     * @param string $slugController O nome do controlador a ser formatado como um slug.
     * @return string O nome do controlador formatado como um slug.
     */
    private function slugController(string $slugController): string
    {
        // Armazena o nome do controlador
        $this->urlSlugController = $slugController;

        // Converte para minúsculas
        $this->urlSlugController = strtolower($this->urlSlugController);

        // Substitui '-' por espaços em branco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);

        // Converte a primeira letra de cada palavra para maiúscula
        $this->urlSlugController = ucwords($this->urlSlugController);

        // Remove espaços em branco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);

        //var_dump($this->urlSlugController);

        // Retorna o nome do controlador formatado como um slug
        return $this->urlSlugController;
    }

    /**
     * Converte o nome do método para um formato de slug.
     *
     * Este método recebe um nome de método e aplica uma série de formatações para transformá-lo
     * em um formato de slug, tornando-o adequado para uso em URLs.
     *
     * @param string $urlSlugMetodo O nome do método a ser formatado como um slug.
     * @return string O nome do método formatado como um slug.
     */
    private function slugMetodo($urlSlugMetodo): string
    {
        // Chama o método slugController para formatar o nome do método como um slug
        $this->urlSlugMetodo = $this->slugController($urlSlugMetodo);

        // Converte a primeira letra para minúscula
        $this->urlSlugMetodo = lcfirst($this->urlSlugMetodo);

        //var_dump($this->urlSlugMetodo);

        // Retorna o nome do método formatado como um slug
        return $this->urlSlugMetodo;
    }


    /**
     * Carrega a página, instanciando o controlador e chamando o método especificado.
     *
     * Este método é responsável por carregar a página, instanciar o controlador
     * especificado na URL e chamar o método correspondente a ser executado.
     *
     * @return void
     */
    public function loadPage()
    {
        // Exibe uma mensagem indicando que a página está sendo carregada e
        // mostra o nome do controlador que será utilizado
        //echo "Carregar página: {$this->urlController}<br>";

        // Define o namespace e nome completo do controlador
        $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;

        // Cria uma instância do controlador
        $classPage = new $this->classLoad();

        // Chama o método especificado na URL
        $classPage->{$this->urlMetodo}();
    }
}
