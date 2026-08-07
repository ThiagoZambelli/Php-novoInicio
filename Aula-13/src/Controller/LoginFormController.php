<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

use Aula13\Mvc\Helper\HtmlRendererTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginFormController implements RequestHandlerInterface
{
    use HtmlRendererTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($_SESSION['logado'] === true) {
            return new Response(302, ['Location' => '/']);
        }
        return new Response(200, body: $this->renderTemplate('login-form.php'));
    }
}
