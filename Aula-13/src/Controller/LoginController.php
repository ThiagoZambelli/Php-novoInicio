<?php

declare(strict_types=1);
namespace Aula13\Mvc\Controller;


use Aula13\Mvc\Controller\Controller;
use Aula13\Mvc\Helper\FlashMessageTrait;


class LoginController implements Controller
{
    use FlashMessageTrait;
    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . "/../../banco.sqlite";
        $this->pdo = new \PDO("sqlite:$dbPath");
    }
    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST,"password");
        
        $sql = 'SELECT * FROM users WHERE email=?;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);
        $currectPassword = password_verify($password, $userData['password'] ?? '');

        if($currectPassword) {            
            $_SESSION['logado'] = true;
            header('Location: /');
        } else {
            $this->addErrorMessage('Credenciais invalidas');
            header('Location: /login');
        };
    }
}