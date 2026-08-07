<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

use Aula13\Mvc\Entity\Video;
use Aula13\Mvc\Helper\FlashMessageTrait;
use Aula13\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewVideoController implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function __construct(
        private VideoRepository $videoRepository
    ) {}

    public function handle(
        ServerRequestInterface $request
    ): ResponseInterface {
        $body = $request->getParsedBody();

        $url = filter_var(
            $body['url'] ?? null,
            FILTER_VALIDATE_URL
        );

        if ($url === false) {
            $this->addErrorMessage('URL inválida');

            return new Response(
                302,
                ['Location' => '/novo-video']
            );
        }

        $titulo = $body['titulo'] ?? null;

        if (!is_string($titulo) || $titulo === '') {
            $this->addErrorMessage('Título não informado');

            return new Response(
                302,
                ['Location' => '/novo-video']
            );
        }

        $video = new Video(
            $url,
            $titulo
        );

        if (
            isset($_FILES['image']) &&
            $_FILES['image']['error'] === UPLOAD_ERR_OK
        ) {
            $nomeArquivo =
                uniqid()
                . basename($_FILES['image']['name']);

            $caminhoDestino =
                __DIR__
                . '/../../public/img/uploads/'
                . $nomeArquivo;

            $uploadRealizado = move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $caminhoDestino
            );

            if ($uploadRealizado) {
                $video->setFilePath($nomeArquivo);
            }
        }

        $success = $this->videoRepository->add($video);

        if ($success === false) {
            $this->addErrorMessage(
                'Erro ao cadastrar vídeo'
            );

            return new Response(
                302,
                ['Location' => '/novo-video']
            );
        }

        return new Response(
            302,
            ['Location' => '/']
        );
    }
}
