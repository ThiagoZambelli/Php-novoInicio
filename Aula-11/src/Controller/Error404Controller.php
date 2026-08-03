<?php

declare(strict_types=1);

namespace Aula11\Mvc\Controller;

class Error404Controller implements Controller
{
    public function processaRequisicao(): void
    {
        http_response_code(404);

        echo '<h1>Página não encontrada</h1>';
    }
}