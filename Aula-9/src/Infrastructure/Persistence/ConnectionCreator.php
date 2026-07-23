<?php

namespace Aula9\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {

        $caminhoBanco = __DIR__ . '/../../../banco.sqlite';
        return new PDO('sqlite:' . $caminhoBanco);
    }
}
