<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

use Aula13\Mvc\Helper\FlashMessageTrait;
use Aula13\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteVideoController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            $this-> addErrorMessage('ID inválido');
            return new Response(302, ['Location' => '/']);
        }

        $success = $this->videoRepository->remove($id);
        if ($success === false) {
             $this-> addErrorMessage('Erro ao remover video');
            return new Response(302, ['Location' => '/']);
        } else {
            return new Response(302, ['Location' => '/']);
        }

    }
}
