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

class EditVideoController implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function __construct(
        private VideoRepository $videoRepository
    ) {}

    public function handle(
        ServerRequestInterface $request
    ): ResponseInterface {
        $queryParams = $request->getQueryParams();
        $body = $request->getParsedBody();

        $id = filter_var(
            $queryParams['id'] ?? null,
            FILTER_VALIDATE_INT
        );

        if ($id === false || $id === null) {
            $this->addErrorMessage('Erro ao editar vídeo');

            return new Response(
                302,
                ['Location' => '/']
            );
        }

        $url = filter_var(
            $body['url'] ?? null,
            FILTER_VALIDATE_URL
        );

        if ($url === false) {
            $this->addErrorMessage('URL inválida');

            return new Response(
                302,
                ['Location' => '/']
            );
        }

        $titulo = $body['titulo'] ?? null;

        if (!is_string($titulo) || $titulo === '') {
            $this->addErrorMessage('Título inválido');

            return new Response(
                302,
                ['Location' => '/']
            );
        }

        $video = new Video(
            $url,
            $titulo
        );

        $video->setId($id);

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

        $success = $this->videoRepository->update($video);

        if ($success === false) {
            $this->addErrorMessage(
                'Erro ao atualizar vídeo'
            );

            return new Response(
                302,
                ['Location' => '/']
            );
        }

        return new Response(
            302,
            ['Location' => '/']
        );
    }
}
