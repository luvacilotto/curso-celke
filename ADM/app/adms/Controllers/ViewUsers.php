<?php

namespace App\adms\Controllers;

/**
 * Controlador para a visualização de usuários.
 * Esta classe lida com a exibição da página de visualização de usuários,
 * permitindo o envio de dados para a visão.
 */

class ViewUsers
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW. */
    private array|string|null $data;


    /**
     * Instancia a classe responsável em carregar a View e envia os dados para View.
     * Este método exibe a página de visualização de usuários e permite o envio de dados para a visão.
     *
     * @return void
     */
    public function index(): void
    {
        // Exibe a mensagem indicando a página de visualização de usuários
        echo "Página visualizar usuários<br>";

        // Inicializa a variável de dados com null (nenhum dado inicial)
        $this->data = [];

        // Carrega a visão da página de visualização de usuários usando a classe ConfigView
        $loadView = new \Core\ConfigView("adms/Views/users/viewUser", $this->data);
        $loadView->loadView();
    }
}
