<?php

namespace App\adms\Controllers;

/**
 * Controlador para a página de erro.
 * Esta classe lida com a exibição da página de erro e a apresentação de uma mensagem personalizada.
 */

class Erro
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW. */
    private array|string|null $data;


    /**
     * Instancia a classe responsável em carregar a View e envia os dados para View.
     * Este método exibe a página de erro e apresenta uma mensagem personalizada de erro.
     *
     * @return void
     */
    public function index(): void
    {
        // Exibe a mensagem de erro na página
        echo "Página de Erro<br>";

        // Define a mensagem de erro
        $this->data = "<p style='color: #f00;'>Página não encontrada!</p>";

        // Carrega a visão da página de erro usando a classe ConfigView
        $loadView = new \Core\ConfigView("adms/Views/erro/erro", $this->data);
        $loadView->loadView();
    }
}