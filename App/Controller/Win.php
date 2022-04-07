<?php

namespace App\Controller;

class Win implements Controller
{
    public function render()
    {
        setcookie("word", "");
        setcookie("tentative", "0");
        echo "Victoire !!";
        echo '<a href="/">Nouvelle partie</a>';
    }
}
