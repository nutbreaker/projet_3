<?php
require_once('./DBConnect.php');
require_once('./ContactManager.php');
require_once('./Contact.php');

$db = new DBConnect();
$contactManager = new ContactManager($db);

$list = function () use ($contactManager) {
    $contacts = $contactManager->findAll();

    foreach ($contacts as $contact) {
        echo ($contact . "\n");
    }
};

while (true) {
    $line = readline("Entrez votre commande : ");

    try {
        $result = match ($line) {
            'list' => $list(),
            default => "Vous avez saisi : $line\n",
        };

        echo ($result);
    } catch (\UnhandledMatchError $e) {
    }
}
