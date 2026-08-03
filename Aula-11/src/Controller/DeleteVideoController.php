<?php

declare(strict_types=1);

namespace Aula11\Mvc\Controller;

use Aula11\Mvc\Repository\VideoRepository;

class DeleteVideoController implements Controller
{
    public function __construct(
        private VideoRepository $videoRepository
    ) {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            exit;
        }

        $sucesso = $this->videoRepository->remove($id);

        if ($sucesso) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }

        exit;
    }
}