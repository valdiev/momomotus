<?php

namespace App\Controller;

class Fail implements Controller
{
    public function render()
    {
        setcookie("word", "");
        setcookie("tentative", "0");
        echo "Vous n'avez plus de tentative...";
        echo '<a href="/">Nouvelle partie</a>';
    }
}
