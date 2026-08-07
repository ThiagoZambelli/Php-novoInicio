<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

class LoginFormController extends ControllerWithHtml implements Controller
{
    public function processaRequisicao(): void
    {
        if( $_SESSION['logado'] === true){
            header('Location: /');
        }
        echo $this->renderTemplate('login-form.php');
    }
}
