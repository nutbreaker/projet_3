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
    list($commandArg, $args) = array_pad(explode(" ", $line, 2), 2, null);

    try {
        $result = match ($commandArg) {
            'list' => $command->list(),
            'detail' => $command->detail($args),
            'create' => $command->create($args),
            'delete' => $command->delete($args),
            default => "Vous avez saisi : $line\n",
        };

        echo ($result);
    } catch (\UnhandledMatchError $e) {
    }
}
