<?php

declare(strict_types=1);

namespace App\Controller;

class Win implements Controller
{
    public function render(): void
    {
        setcookie('word', '');
        setcookie('tentative', '0');
        echo 'Victoire !!';
        echo '<a href="/">Nouvelle partie</a>';
    }
}
