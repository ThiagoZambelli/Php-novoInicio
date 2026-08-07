<?php

declare(strict_types=1);

namespace Aula13\Mvc\Helper;

trait FlashMessageTrait {
    private function addErrorMessage(string $erroMessage): void {
        $_SESSION["error_message"] = $erroMessage;
    }
}