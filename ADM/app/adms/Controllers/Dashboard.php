<?php

namespace App\adms\Controllers;

/**
 * Controlador para a página de Dashboard.
 * Esta classe lida com a exibição da página de erro e a apresentação de uma mensagem personalizada.
 */

class Dashboard
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
        // Define a mensagem
        $this->data = "Bem vindo";

        // Carrega a visão da página dashboard usando a classe ConfigView
        $loadView = new \Core\ConfigView("adms/Views/dashboard/dashboard", $this->data);
        $loadView->loadView();
    }
}