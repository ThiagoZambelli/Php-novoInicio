<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

use Aula13\Mvc\Helper\HtmlRendererTrait;

class LoginFormController implements Controller
{
    use HtmlRendererTrait;
    public function processaRequisicao(): void
    {
        if( $_SESSION['logado'] === true){
            header('Location: /');
        }
        echo $this->renderTemplate('login-form.php');
    }
}
