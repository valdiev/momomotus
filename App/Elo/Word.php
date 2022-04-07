<?php

declare(strict_types=1);

namespace App\Elo;

class Word {
    public int $word;

    public function getWord(): int {
        return $this->word;
    }
}