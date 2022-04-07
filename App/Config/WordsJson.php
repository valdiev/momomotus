<?php

namespace App\Config;


class WordsJson
{
    private const FILE_PATH = __DIR__ . "/../../Data/words.json";
    private array $words = [];

    private function loadFile()
    {
        if (empty($this->words)) {
            $this->words = json_decode(file_get_contents(self::FILE_PATH), true);
        }

        return $this->words;
    }

    public function getWord() {
        $this->loadFile();
        shuffle($this->words);
        
        if (!isset($_COOKIE['word']) || $_COOKIE['word'] == "" ) {
            setcookie('word', $this->words[0]['word']);
            $_COOKIE['word'] = $this->words[0]['word'];
        }

    }
}
