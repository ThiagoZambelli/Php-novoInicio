<?php

declare(strict_types=1);

namespace Aula13\Mvc\Helper;

trait HtmlRendererTrait
{
    private function renderTemplate(string $templateName, array $context = []): string
    {
        $templatePath = __DIR__ . '/../../views/';
        extract($context);

        ob_start();
        require_once $templatePath . $templateName;
        return ob_get_clean();
    }
}
