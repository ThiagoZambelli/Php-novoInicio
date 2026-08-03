<?php

declare(strict_types=1);

namespace Aula11\Mvc\Controller;

use Aula11\Mvc\Model\Video;
use Aula11\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{
    public function __construct(
        private VideoRepository $videoRepository
    ) {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(
            INPUT_POST,
            'url',
            FILTER_VALIDATE_URL
        );

        if ($url === false || $url === null) {
            header('Location: /?sucesso=0');
            exit;
        }

        $titulo = filter_input(INPUT_POST, 'titulo');

        if ($titulo === false || $titulo === null) {
            header('Location: /?sucesso=0');
            exit;
        }

        $video = new Video(
            url: $url,
            title: $titulo
        );

        $sucesso = $this->videoRepository->add($video);

        if ($sucesso) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }

        exit;
    }
}