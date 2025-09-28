<?php

while (true) {
    $line = readline("Entrez votre commande : ");

    try {
        $result = match ($line) {
            'list' => "affichage de la liste\n",
            default => "Vous avez saisi : $line\n",
        };

        echo ($result);
    } catch (\UnhandledMatchError $e) {
    }
}
