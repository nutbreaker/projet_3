<?php
require_once('./DBConnect.php');
require_once('./ContactManager.php');
require_once('./Contact.php');
require_once('./Command.php');

$db = new DBConnect();
$contactManager = new ContactManager($db);
$command = new Command($contactManager);

while (true) {
    $line = readline("Entrez votre commande : ");

    try {
        $result = match ($line) {
            'list' => $command->list(),
            default => "Vous avez saisi : $line\n",
        };

        echo ($result);
    } catch (\UnhandledMatchError $e) {
    }
}
