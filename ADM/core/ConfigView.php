<?php

namespace Core;

/**
 * Carregar as páginas da View
 */
class ConfigView
{
    /**
     * Receber o endereço da View e os dados
     *
     * @param string $nameView Nome da View que deve ser carregada
     * @param array|string|null $data Dados que a View deve receber.
     */
    public function __construct(private string $nameView, private array|string|null $data)
    {
    }

    /**
     * Carregar a View.
     * Verifica se o arquivo existe. Se existir, será carregado. Se não existir, apresenta a mensagem de erro.
     *
     * @return void
     */
    public function loadView(): void
    {
        // Verifica se o arquivo da página de visão existe
        if (file_exists('app/' . $this->nameView . '.php')) {
            // Inclui o arquivo da página de visão
            include 'app/' . $this->nameView . '.php';
        } else {
            // Exibe uma mensagem de erro se a página não for encontrada
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador " . EMAILADM);
        }
    }
}
