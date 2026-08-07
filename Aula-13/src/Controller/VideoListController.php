<?php

declare(strict_types=1);

namespace Aula13\Mvc\Controller;

use Aula13\Mvc\Helper\HtmlRendererTrait;
use Aula13\Mvc\Repository\VideoRepository;

class VideoListController implements Controller
{
    use HtmlRendererTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {        
        $videoList = $this->videoRepository->all();
        echo $this->renderTemplate('video-list.php', ['videoList' => $videoList]);
    }
}
