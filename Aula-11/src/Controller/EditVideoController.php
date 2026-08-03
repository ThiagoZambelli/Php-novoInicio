<?php

declare(strict_types=1);

namespace Aula11\Mvc\Controller;

use Aula11\Mvc\Model\Video;
use Aula11\Mvc\Repository\VideoRepository;

class EditVideoController implements Controller
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

        $url = filter_input(
            INPUT_POST,
            'url',
            FILTER_VALIDATE_URL
        );

        if ($url === false || $url === null) {
            header('Location: /?sucesso=0');
            exit;
        }

        $titulo = filter_input(
            INPUT_POST,
            'titulo'
        );

        if ($titulo === false || $titulo === null) {
            header('Location: /?sucesso=0');
            exit;
        }

        $video = new Video(
            url: $url,
            title: $titulo
        );

        $video->setId($id);

        $sucesso = $this->videoRepository->update($video);

        if ($sucesso) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }

        exit;
    }
}