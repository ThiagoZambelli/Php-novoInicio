<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

use Aula13\Mvc\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginController implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../banco.sqlite';
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function handle(
        ServerRequestInterface $request
    ): ResponseInterface {
        $body = $request->getParsedBody();

        $email = filter_var(
            $body['email'] ?? null,
            FILTER_VALIDATE_EMAIL
        );

        $password = $body['password'] ?? null;

        if ($email === false || !is_string($password)) {
            $this->addErrorMessage('Credenciais inválidas');

            return new Response(
                302,
                ['Location' => '/login']
            );
        }

        $sql = 'SELECT * FROM users WHERE email = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);

        $correctPassword = password_verify(
            $password,
            $userData['password'] ?? ''
        );

        if ($correctPassword) {
            $_SESSION['logado'] = true;

            return new Response(
                302,
                ['Location' => '/']
            );
        }

        $this->addErrorMessage('Credenciais inválidas');

        return new Response(
            302,
            ['Location' => '/login']
        );
    }
}
