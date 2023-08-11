<?php

namespace App\adms\Controllers;

/**
 * Controlador responsável pela página de login.
 * Esta classe gerencia a exibição da página de login e permite o envio de dados
 * específicos para a visão da página.
 */

class Login
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW. */
    private array|string|null $data = [];

    /** @var array $dataForm Recebe os dados do formulário. */
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View e envia os dados para View.
     * Este método é responsável por exibir a página de login, permitindo o envio de dados específicos para a visão.
     *
     * @return void
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['SendLogin'])) {
            $valLogin = new \App\adms\Models\AdmsLogin();
            $valLogin->login($this->dataForm);
            if ($valLogin->getResult()) {
                $urlRedirect = URLADM . "dashboard/index";
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
            }
        }

        // Inicializa a variável de dados com null (nenhum dado inicial)
        //$this->data = null;

        // Carrega a visão da página de login utilizando a classe ConfigView
        $loadView = new \Core\ConfigView("adms/Views/login/login", $this->data);
        $loadView->loadView();
    }
}
