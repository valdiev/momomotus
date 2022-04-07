<?php

namespace App\Controller;

use App\Config\WordsJson;


class Home implements Controller
{
    public function render()
    {
        $wordJson = new WordsJson();
        $wordJson->getWord();
        $word = htmlspecialchars($_COOKIE["word"]);
        $splitWord = str_split($word);
        $length = strlen($word);

        echo "MOMOMOTUS<br><br>";
        echo '
        <form method="post">
            <input type="text" name="word" />
            <input type="submit" name="submit" value="Valider">
        </form>';
        
        if ( isset( $_POST['submit'] ) ) {
            $search = strtolower($_POST['word']);
            $splitSearch = str_split($search);
            setcookie('tentative', $_COOKIE["tentative"] + 1);
            echo "Tentative(s) restante(s) " . 5 - $_COOKIE["tentative"];
            
            echo '<div style="display: flex; gap: 10px;">';
            if($length !== strlen($search)) {
                echo '<br>Veuillez entrer un mot en ' . $length . " lettres.";
            } elseif ($_COOKIE["tentative"] < 5) {
                if($search == $word) {
                header('Location: /win');
                }
                else {
                    for ($i = 0; $i < $length; $i++) {
                        if($splitSearch[$i] == $splitWord[$i]) {
                            echo '<span style="background-color: green; width: 60px; height: 60px; color: white; display: flex; justify-content: center; align-items: center;">' . $splitSearch[$i] . '</span>';
                        } else if (in_array($splitSearch[$i], $splitWord)) {
                            echo '<span style="background-color: #ffc400; width: 60px; height: 60px; color: white; display: flex; justify-content: center; align-items: center;">' . $splitSearch[$i] . '</span>';
                        } else {
                            echo '<span style="background-color: red; width: 60px; height: 60px; color: white; display: flex; justify-content: center; align-items: center;">' . $splitSearch[$i] . '</span>';
                        }
                    }
                }
            }
            else {
                setcookie("tentative", "0");
                header('Location: /fail');
            }
            echo '</div>';

        }
    }
}
