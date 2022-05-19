<?php

declare(strict_types=1);

namespace App\Controller;

class NotFound implements Controller
{
    public function render(): void
    {
        echo 'NotFound';
    }
}
